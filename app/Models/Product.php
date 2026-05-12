<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'brand_id',
        'category_id',
        'subcategory_id',
        'child_category_id',
        'name',
        'slug',
        'part_code',
        'thumbnail',

        'short_description',
        'full_description',
        'specifications',

        'tags',
        'packaging',
        'additional_info',

        'featured',
        'is_future',
        'status',

        'meta_title',
        'meta_description',
        'meta_keywords',

    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function childCategory()
    {
        return $this->belongsTo(ChildCategory::class);
    }
}
