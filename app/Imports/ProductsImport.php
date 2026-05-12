<?php

namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductImportLog;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class ProductsImport implements OnEachRow, WithChunkReading, SkipsEmptyRows, WithHeadingRow
{
    private const ERROR_CAP = 400;

    /** @var array<string, int|null> */
    private array $brandCache = [];

    /** @var array<string, Category|null> */
    private array $categoryCache = [];

    /** @var array<string, Subcategory|null> */
    private array $subcategoryCache = [];

    /** @var array<string, ChildCategory|null> */
    private array $childCategoryCache = [];

    /** @var array<string, string>|null */
    private ?array $imageIndex = null;

    public function __construct(
        private int $importLogId,
        private string $imagesExtractPath,
    ) {}

    public function chunkSize(): int
    {
        return 100;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function onRow(Row $row): void
    {
        $rowIndex = $row->getIndex();
        $data = $row->toArray();

        $name = $this->stringValue($this->getCell($data, 'name'));
        if ($name === '') {
            $this->skipRow($rowIndex, 'Product name is required.');

            return;
        }

        $categoryName = $this->stringValue($this->getCell($data, 'category'));
        $subName = $this->stringValue($this->getCell($data, 'sub_category', 'subcategory'));
        if ($categoryName === '' || $subName === '') {
            $this->skipRow($rowIndex, 'Category and sub_category are required.');

            return;
        }

        $category = $this->resolveCategory($categoryName);
        if (! $category) {
            $this->skipRow($rowIndex, 'Category not found: '.$categoryName);

            return;
        }

        $subcategory = $this->resolveSubcategory($category->id, $subName);
        if (! $subcategory) {
            $this->skipRow($rowIndex, 'Subcategory not found for this category: '.$subName);

            return;
        }

        $brandId = null;
        $brandCell = $this->stringValue($this->getCell($data, 'brand'));
        if ($brandCell !== '') {
            $brandId = $this->resolveBrandId($brandCell);
            if ($brandId === null) {
                $this->skipRow($rowIndex, 'Brand not found: '.$brandCell);

                return;
            }
        }

        $childCategoryId = null;
        $childCell = $this->stringValue($this->getCell($data, 'child_category', 'childcategory'));
        if ($childCell !== '') {
            $child = $this->resolveChildCategory($category->id, $subcategory->id, $childCell);
            if (! $child) {
                $this->skipRow($rowIndex, 'Child category not found for this category/subcategory: '.$childCell);

                return;
            }
            $childCategoryId = $child->id;
        }

        $slugInput = $this->stringValue($this->getCell($data, 'slug'));
        $baseSlug = $slugInput !== '' ? Str::slug($slugInput) : Str::slug($name);
        if ($baseSlug === '') {
            $baseSlug = Str::slug($name).'-'.Str::lower(Str::random(6));
        }
        $slug = $this->uniqueSlug($baseSlug);

        $partCodeCell = $this->stringValue($this->getCell($data, 'part_code'));
        $productExists = Product::withTrashed()->where('name', $name)
            ->when($partCodeCell !== '', function($q) use ($partCodeCell) {
                return $q->orWhere('part_code', $partCodeCell);
            })
            ->first();
        // We will update if it exists, or create if not.

        $dateStr = now()->format('dmY');

        $thumbCell = $this->stringValue($this->getCell($data, 'thumbnail'));
        $thumbnail = null;
        if ($thumbCell !== '') {
            $thumbnail = $this->copyImageFromZip(
                $thumbCell,
                public_path('uploads/products'),
                $slug . '_' . $dateStr . '_thumbnail'
            );
            if (!$thumbnail) {
                $this->applyLogDelta(0, 0, [['row' => $rowIndex, 'message' => "Warning: Thumbnail image '{$thumbCell}' not found in ZIP archive."]]);
            }
        } elseif ($productExists && $productExists->thumbnail) {
            $thumbnail = $productExists->thumbnail;
        }

        $status = $this->parseBoolStatus($this->getCell($data, 'status'), true);
        $featured = $this->parseBoolStatus($this->getCell($data, 'featured'), false);
        $isFuture = $this->parseBoolStatus($this->getCell($data, 'is_future', 'future'), false);

        DB::transaction(function () use ($data, $brandId, $category, $subcategory, $childCategoryId, $name, $slug, $partCodeCell, $thumbnail, $status, $featured, $dateStr, $isFuture, $productExists) {
            $partCode = $partCodeCell !== '' ? $partCodeCell : ($productExists?->part_code ?? $this->uniquePartCode());
            
            $product = Product::updateOrCreate(
                ['name' => $name],
                [
                    'brand_id' => $brandId,
                    'category_id' => $category->id,
                    'subcategory_id' => $subcategory->id,
                    'child_category_id' => $childCategoryId,
                    'slug' => $productExists?->slug ?? $slug,
                    'part_code' => $partCode,
                    'thumbnail' => $thumbnail,
                    'short_description' => $this->nullableString($this->getCell($data, 'short_description')),
                    'full_description' => $this->nullableString($this->getCell($data, 'full_description')),
                    'specifications' => $this->nullableString($this->getCell($data, 'specifications')),
                    'tags' => $this->nullableString($this->getCell($data, 'tags')),
                    'packaging' => $this->nullableString($this->getCell($data, 'packaging')),
                    'additional_info' => $this->nullableString($this->getCell($data, 'additional_info')),
                    'featured' => $featured,
                    'is_future' => $isFuture,
                    'status' => $status,
                    'meta_title' => $this->nullableString($this->getCell($data, 'meta_title')),
                    'meta_description' => $this->nullableString($this->getCell($data, 'meta_description')),
                    'meta_keywords' => $this->nullableString($this->getCell($data, 'meta_keywords')),
                ]
            );

            $galleryRaw = $this->stringValue($this->getCell($data, 'gallery_images', 'gallery'));
            if ($galleryRaw !== '') {
                $names = preg_split('/\s*[,;|]\s*/', $galleryRaw, -1, PREG_SPLIT_NO_EMPTY) ?: [];
                $galleryDir = public_path('uploads/products/gallery');
                foreach ($names as $index => $imageName) {
                    $stored = $this->copyImageFromZip(
                        $imageName, 
                        $galleryDir,
                        $slug . '_' . $dateStr . '_gallery_' . ($index + 1)
                    );
                    if ($stored) {
                        ProductImage::create([
                            'product_id' => $product->id,
                            'image' => $stored,
                        ]);
                    }
                }
            }
        });

        $this->applyLogDelta(1, 0, []);
    }

    private function skipRow(?int $rowIndex, string $message): void
    {
        $log = ProductImportLog::find($this->importLogId);
        $errors = [];
        if ($log && count($log->errors ?? []) < self::ERROR_CAP) {
            $errors[] = ['row' => $rowIndex, 'message' => $message];
        }

        $this->applyLogDelta(0, 1, $errors);
    }

    /**
     * @param  list<array{row: int|null, message: string}>  $newErrors
     */
    private function applyLogDelta(int $imported, int $skipped, array $newErrors): void
    {
        if ($imported === 0 && $skipped === 0 && $newErrors === []) {
            return;
        }

        $log = ProductImportLog::find($this->importLogId);
        if (! $log) {
            return;
        }

        $merged = array_merge($log->errors ?? [], $newErrors);
        if (count($merged) > self::ERROR_CAP) {
            $merged = array_slice($merged, -self::ERROR_CAP);
        }

        $log->update([
            'imported_rows' => $log->imported_rows + $imported,
            'skipped_rows' => $log->skipped_rows + $skipped,
            'errors' => $merged,
        ]);
    }

    private function resolveBrandId(string $name): ?int
    {
        $key = Str::lower($name);
        if (array_key_exists($key, $this->brandCache)) {
            return $this->brandCache[$key];
        }
        $brand = Brand::whereRaw('LOWER(name) = ?', [$key])->first();
        $id = $brand?->id;
        $this->brandCache[$key] = $id;

        return $id;
    }

    private function resolveCategory(string $name): ?Category
    {
        $key = Str::lower($name);
        if (array_key_exists($key, $this->categoryCache)) {
            return $this->categoryCache[$key];
        }
        $cat = Category::whereRaw('LOWER(name) = ?', [$key])->first();
        $this->categoryCache[$key] = $cat;

        return $cat;
    }

    private function resolveSubcategory(int $categoryId, string $name): ?Subcategory
    {
        $key = $categoryId.'|'.Str::lower($name);
        if (array_key_exists($key, $this->subcategoryCache)) {
            return $this->subcategoryCache[$key];
        }
        $sub = Subcategory::where('category_id', $categoryId)
            ->whereRaw('LOWER(name) = ?', [Str::lower($name)])
            ->first();
        $this->subcategoryCache[$key] = $sub;

        return $sub;
    }

    private function resolveChildCategory(int $categoryId, int $subcategoryId, string $name): ?ChildCategory
    {
        $key = $categoryId.'|'.$subcategoryId.'|'.Str::lower($name);
        if (array_key_exists($key, $this->childCategoryCache)) {
            return $this->childCategoryCache[$key];
        }
        $child = ChildCategory::where('category_id', $categoryId)
            ->where('subcategory_id', $subcategoryId)
            ->whereRaw('LOWER(name) = ?', [Str::lower($name)])
            ->first();
        $this->childCategoryCache[$key] = $child;

        return $child;
    }

    private function uniqueSlug(string $base): string
    {
        $slug = $base;
        $i = 2;
        while (Product::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $base.'-'.$i;
            $i++;
        }

        return $slug;
    }

    private function uniquePartCode(): string
    {
        do {
            $code = 'IMP-'.strtoupper(Str::random(10));
        } while (Product::withTrashed()->where('part_code', $code)->exists());

        return $code;
    }

    private function copyImageFromZip(string $filename, string $destDir, ?string $customName = null): ?string
    {
        $filename = trim($filename);
        if ($filename === '') {
            return null;
        }

        $basename = basename($filename);
        $idx = $this->imageIndex();
        $lower = Str::lower($basename);
        if (! isset($idx[$lower])) {
            return null;
        }

        $source = $idx[$lower];
        if (! is_file($source)) {
            return null;
        }

        $extension = pathinfo($basename, PATHINFO_EXTENSION);
        $newName = $customName 
            ? $customName . '.' . $extension 
            : time().'_'.uniqid('', true).'_'.$basename;

        if (! is_dir($destDir)) {
            mkdir($destDir, 0755, true);
        }
        if (! @copy($source, $destDir.DIRECTORY_SEPARATOR.$newName)) {
            return null;
        }

        return $newName;
    }

    /**
     * @return array<string, string>
     */
    private function imageIndex(): array
    {
        if ($this->imageIndex !== null) {
            return $this->imageIndex;
        }

        $this->imageIndex = [];
        if (! is_dir($this->imagesExtractPath)) {
            return $this->imageIndex;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($this->imagesExtractPath, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            if (! $file->isFile()) {
                continue;
            }
            $this->imageIndex[Str::lower($file->getBasename())] = $file->getPathname();
        }

        return $this->imageIndex;
    }

    private function parseBoolStatus(mixed $value, bool $defaultActive): int
    {
        if ($value === null || $value === '') {
            return $defaultActive ? 1 : 0;
        }
        if (is_numeric($value)) {
            return ((int) $value) === 1 ? 1 : 0;
        }

        $v = Str::lower(trim((string) $value));

        return in_array($v, ['1', 'true', 'yes', 'active', 'y'], true) ? 1 : 0;
    }

    private function stringValue(mixed $v): string
    {
        if ($v === null) {
            return '';
        }
        if (is_numeric($v)) {
            return trim((string) $v);
        }

        return trim((string) $v);
    }

    private function nullableString(mixed $v): ?string
    {
        $s = $this->stringValue($v);

        return $s === '' ? null : $s;
    }

    /**
     * @param  array<int|string, mixed>  $row
     */
    private function getCell(array $row, string ...$keys): mixed
    {
        foreach ($keys as $key) {
            if (array_key_exists($key, $row) && $row[$key] !== null && $row[$key] !== '') {
                return $row[$key];
            }
        }

        return null;
    }
}
