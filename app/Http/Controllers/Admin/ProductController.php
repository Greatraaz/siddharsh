<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductsExport;
use App\Http\Controllers\Controller;
use App\Jobs\ProductImportJob;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\ProductImage;
use App\Models\ProductImportLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use ZipArchive;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['brand', 'category', 'subcategory', 'childCategory'])->latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        
        $subcategories = collect();
        if (old('category_id')) {
            $subcategories = Subcategory::where('category_id', old('category_id'))->where('status', 1)->get();
        }

        $childcategories = collect();
        if (old('subcategory_id')) {
            $childcategories = ChildCategory::where('subcategory_id', old('subcategory_id'))->where('status', 1)->get();
        }

        return view('admin.products.create', compact('brands', 'categories', 'subcategories', 'childcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    

    public function store(Request $request)
    {
        $request->validate([

            'brand_id'       => 'nullable|exists:brands,id',
            'category_id'    => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'child_category_id' => 'nullable|exists:child_categories,id',

            'name'           => 'required|string|max:255|unique:products,name',
            'part_code'      => 'required|string|max:255|unique:products,part_code',

            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'short_description' => 'nullable|string',
            'full_description'  => 'nullable|string',
            'specifications'    => 'nullable|string',

            'tags'           => 'nullable|string',
            'packaging'      => 'nullable|string',
            'additional_info'=> 'nullable|string',

            'status'         => 'required|in:0,1',
            'featured'       => 'nullable|in:0,1',

            'meta_title'     => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'  => 'nullable|string',

        ]);

        // IMAGE UPLOAD
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
        }

        // CREATE PRODUCT
        $product = Product::create([

            'brand_id'           => $request->brand_id,
            'category_id'        => $request->category_id,
            'subcategory_id'     => $request->subcategory_id,
            'child_category_id'  => $request->child_category_id,

            'name'               => $request->name,
            'slug'               => Str::slug($request->name),
            'part_code'          => $request->part_code,

            'thumbnail'          => $imageName,

            'short_description'  => $request->short_description,
            'full_description'   => $request->full_description,
            'specifications'     => $request->specifications,

            'tags'               => $request->tags,
            'packaging'          => $request->packaging,
            'additional_info'    => $request->additional_info,

            'featured'           => $request->featured ?? 0,
            'status'             => $request->status,

            'meta_title'         => $request->meta_title,
            'meta_description'   => $request->meta_description,
            'meta_keywords'      => $request->meta_keywords,

        ]);

        // MULTIPLE IMAGES UPLOAD
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $multiImageName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/products/gallery'), $multiImageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $multiImageName,
                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Created Successfully');
    }

        /**
         * Display the specified resource.
         */
        public function show(string $id)
        {
            $product = Product::findOrFail($id);
            return view('admin.products.show', compact('product'));
        }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
        $product = Product::findOrFail($id);
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        
        $categoryId = old('category_id', $product->category_id);
        $subcategoryId = old('subcategory_id', $product->subcategory_id);

        $subcategories = Subcategory::where('category_id', $categoryId)->where('status', 1)->get();
        $childcategories = ChildCategory::where('subcategory_id', $subcategoryId)->where('status', 1)->get();

        return view('admin.products.edit', compact('product', 'brands', 'categories', 'subcategories', 'childcategories'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([

            'brand_id'       => 'nullable|exists:brands,id',
            'category_id'    => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'child_category_id' => 'nullable|exists:child_categories,id',

            'name'           => 'required|unique:products,name,'.$product->id,
            'part_code'      => 'required|unique:products,part_code,'.$product->id,

            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images.*'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'short_description' => 'nullable|string',
            'full_description'  => 'nullable|string',
            'specifications'    => 'nullable|string',

            'tags'           => 'nullable|string',
            'packaging'      => 'nullable|string',
            'additional_info'=> 'nullable|string',

            'status'         => 'required|in:0,1',
            'featured'       => 'nullable|in:0,1',

            'meta_title'     => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords'  => 'nullable|string',

        ]);

        $imageName = $product->thumbnail;

        // IMAGE UPDATE
        if ($request->hasFile('image')) {

            if ($product->thumbnail && file_exists(public_path('uploads/products/'.$product->thumbnail))) {
                unlink(public_path('uploads/products/'.$product->thumbnail));
            }

            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
        }

        // UPDATE PRODUCT
        $product->update([

            'brand_id'           => $request->brand_id,
            'category_id'        => $request->category_id,
            'subcategory_id'     => $request->subcategory_id,
            'child_category_id'  => $request->child_category_id,

            'name'               => $request->name,
            'slug'               => Str::slug($request->name),
            'part_code'          => $request->part_code,

            'thumbnail'          => $imageName,

            'short_description'  => $request->short_description,
            'full_description'   => $request->full_description,
            'specifications'     => $request->specifications,

            'tags'               => $request->tags,

            'packaging'          => $request->packaging,
            'additional_info'    => $request->additional_info,

            'featured'           => $request->featured ?? 0,
            'status'             => $request->status,

            'meta_title'         => $request->meta_title,
            'meta_description'   => $request->meta_description,
            'meta_keywords'      => $request->meta_keywords,

        ]);

        // MULTIPLE IMAGES UPLOAD
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $multiImageName = time() . '_' . uniqid() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/products/gallery'), $multiImageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image'      => $multiImageName,
                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if($product->thumbnail && file_exists(public_path('uploads/products/'.$product->thumbnail))){
            unlink(public_path('uploads/products/'.$product->thumbnail));
        }

        foreach ($product->images as $image) {
            if (file_exists(public_path('uploads/products/gallery/' . $image->image))) {
                unlink(public_path('uploads/products/gallery/' . $image->image));
            }
            $image->delete();
        }

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Deleted Successfully');
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);
        
        if (file_exists(public_path('uploads/products/gallery/' . $image->image))) {
            unlink(public_path('uploads/products/gallery/' . $image->image));
        }

        $image->delete();

        return response()->json(['success' => 'Image Deleted Successfully']);
    }

    public function importPage()
    {
        return view('admin.products.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|file|mimes:xlsx|max:51200',
            'zip' => 'required|file|mimes:zip|max:512000',
        ]);

        $log = ProductImportLog::create([
            'filename' => $request->file('excel')->getClientOriginalName(),
            'status' => 'pending',
            'errors' => [],
        ]);

        $base = 'imports/'.$log->id;

        try {
            $request->file('excel')->storeAs($base, 'products.xlsx');
            $zipRelative = $request->file('zip')->storeAs($base, 'images.zip');

            $extractDir = Storage::disk('local')->path($base.'/images');
            File::ensureDirectoryExists($extractDir);

            $zipPath = Storage::disk('local')->path($zipRelative);
            $zip = new ZipArchive;
            if ($zip->open($zipPath) !== true) {
                throw new \RuntimeException('Could not open the ZIP archive.');
            }
            $zip->extractTo($extractDir);
            $zip->close();
        } catch (\Throwable $e) {
            Storage::disk('local')->deleteDirectory($base);
            $log->delete();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }

        ProductImportJob::dispatch($log->id);

        // Automatically start a background worker to process the job
        $artisanPath = base_path('artisan');
        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            pclose(popen("start /B php \"$artisanPath\" queue:work --stop-when-empty", "r"));
        } else {
            exec("php \"$artisanPath\" queue:work --stop-when-empty > /dev/null 2>&1 &");
        }

        return response()->json([
            'success' => true,
            'import_log_id' => $log->id,
        ]);
    }

    public function importStatus(string $id)
    {
        $log = ProductImportLog::findOrFail($id);
        $processed = $log->imported_rows + $log->skipped_rows;
        $percent = $log->total_rows > 0
            ? (int) min(100, round(($processed / $log->total_rows) * 100))
            : null;

        return response()->json([
            'id' => $log->id,
            'status' => $log->status,
            'total_rows' => $log->total_rows,
            'imported_rows' => $log->imported_rows,
            'skipped_rows' => $log->skipped_rows,
            'errors' => $log->errors ?? [],
            'percent' => $percent,
            'started_at' => $log->started_at,
            'completed_at' => $log->completed_at,
        ]);
    }

    public function downloadTemplate()
    {
        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();

        $headers = [
            'brand',
            'category',
            'sub_category',
            'child_category',
            'name',
            'slug',
            'part_code',
            'thumbnail',
            'gallery_images',
            'tags',
            'short_description',
            'full_description',
            'specifications',
            'packaging',
            'additional_info',
            'featured',
            'is_future',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'status',
        ];

        $sample = [
            'Acme Corp',
            'Electronics',
            'Mobile Phones',
            'Smartphones',
            'Sample product name',
            '',
            '',
            'thumbnail.jpg',
            'gallery-a.jpg, gallery-b.jpg',
            'industrial, oem',
            'Short description text',
            'Longer full description for detail pages.',
            'Size: 10mm; Material: Steel',
            'Retail box',
            'Optional notes',
            1,
            0,
            'Sample SEO title',
            'Meta description for search engines.',
            'keyword one, keyword two',
            1,
        ];

        $sheet->fromArray([$headers], null, 'A1');
        $sheet->fromArray([$sample], null, 'A2');

        $lastCol = 'U';
        $sheet->getStyle('A1:'.$lastCol.'1')->applyFromArray([
            'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '4F46E5'],
            ],
        ]);

        foreach (range('A', $lastCol) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $path = tempnam(sys_get_temp_dir(), 'product-import-template');
        if ($path === false) {
            abort(500, 'Could not create temporary file.');
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($path);
        $spreadsheet->disconnectWorksheets();

        return response()->download($path, 'product-import-template.xlsx', [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }

    public function export()
    {
        $filename = 'products-export-'.date('Y-m-d-His').'.xlsx';

        return Excel::download(new ProductsExport, $filename);
    }
}
