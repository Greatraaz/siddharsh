<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Product::query()
            ->with(['brand', 'category', 'subcategory', 'childCategory', 'images'])
            ->orderBy('id');
    }

    public function headings(): array
    {
        return [
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
            'meta_title',
            'meta_description',
            'meta_keywords',
            'status',
        ];
    }

    /**
     * @param  Product  $product
     */
    public function map($product): array
    {
        $gallery = $product->images->pluck('image')->filter()->implode(', ');

        return [
            $product->brand->name ?? '',
            $product->category->name ?? '',
            $product->subcategory->name ?? '',
            $product->childCategory->name ?? '',
            $product->name,
            $product->slug,
            $product->part_code ?? '',
            $product->thumbnail ?? '',
            $gallery,
            $product->tags ?? '',
            $product->short_description ?? '',
            $product->full_description ?? '',
            $product->specifications ?? '',
            $product->packaging ?? '',
            $product->additional_info ?? '',
            $product->featured ? 1 : 0,
            $product->meta_title ?? '',
            $product->meta_description ?? '',
            $product->meta_keywords ?? '',
            $product->status ? 1 : 0,
        ];
    }
}
