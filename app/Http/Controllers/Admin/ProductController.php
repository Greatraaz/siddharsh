<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use Illuminate\Support\Str;

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

            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'short_description' => 'nullable|string',
            'specifications'    => 'nullable|string',

            'tags'           => 'nullable|string',
            'packaging'      => 'nullable|string',
            'additional_info'=> 'nullable|string',

            'status'         => 'required|in:0,1',
            'featured'       => 'nullable|in:0,1',

        ]);

        // IMAGE UPLOAD
        $imageName = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/products'), $imageName);
        }

        // CREATE PRODUCT
        Product::create([

            'brand_id'           => $request->brand_id,
            'category_id'        => $request->category_id,
            'subcategory_id'     => $request->subcategory_id,
            'child_category_id'  => $request->child_category_id,

            'name'               => $request->name,
            'slug'               => Str::slug($request->name),

            'thumbnail'          => $imageName,

            'short_description'  => $request->short_description,
            'specifications'     => $request->specifications,

            'tags'               => $request->tags,
            'packaging'          => $request->packaging,
            'additional_info'    => $request->additional_info,

            'featured'           => $request->featured ?? 0,
            'status'             => $request->status,

        ]);

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

            'image'          => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'short_description' => 'nullable|string',
            'specifications'    => 'nullable|string',

            'tags'           => 'nullable|string',
            'packaging'      => 'nullable|string',
            'additional_info'=> 'nullable|string',

            'status'         => 'required|in:0,1',
            'featured'       => 'nullable|in:0,1',

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

            'thumbnail'          => $imageName,

            'short_description'  => $request->short_description,
            'specifications'     => $request->specifications,

            'tags'               => $request->tags,

            'packaging'          => $request->packaging,
            'additional_info'    => $request->additional_info,

            'featured'           => $request->featured ?? 0,
            'status'             => $request->status,

        ]);

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

        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Deleted Successfully');
    }
}
