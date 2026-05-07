<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Enquiry;
use App\Mail\AdminEnquiryMail;
use App\Mail\UserEnquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::with(['subcategories.childCategories'])->where('status', 1)->get();
        $brands = Brand::where('status', 1)->take(10)->get();
        $featuredProducts = Product::where('status', 1)->where('featured', 1)->take(8)->get();
        
        // Latest items for homepage sections
        $latestCategories = Category::where('status', 1)->latest()->take(4)->get();
        $latestSubcategories = Subcategory::where('status', 1)->latest()->take(5)->get();
        $latestChildCategories = ChildCategory::where('status', 1)->latest()->take(5)->get();
        $latestBrands = Brand::where('status', 1)->latest()->take(4)->get();
        
        return view('frontend.index', compact(
            'categories', 
            'brands', 
            'featuredProducts', 
            'latestCategories', 
            'latestSubcategories', 
            'latestChildCategories', 
            'latestBrands'
        ));
    }

    public function brands()
    {
        $brands = Brand::where('status', 1)->paginate(20);
        return view('frontend.brands', compact('brands'));
    }

    public function categories()
    {
        $categories = Category::with(['subcategories' => function($q) {
            $q->where('status', 1)->withCount('childCategories');
        }])->where('status', 1)->paginate(30);
        return view('frontend.categories', compact('categories'));
    }
    public function categorySubcategories($slug)
    {
        $category = Category::with(['subcategories.childCategories'])->where('slug', $slug)->firstOrFail();
        $subcategories = $category->subcategories()->where('status', 1)->paginate(20);
        return view('frontend.subcategories', compact('category', 'subcategories'));
    }
    public function subcategories()
    {
        $subcategories = Subcategory::with(['category', 'childCategories'])->where('status', 1)->paginate(30);
        return view('frontend.subcategories', compact('subcategories'));
    }

    public function childCategories()
    {
        $childCategories = ChildCategory::with(['subcategory.category'])->where('status', 1)->paginate(40);
        return view('frontend.child_categories', compact('childCategories'));
    }

    public function categoryProducts($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with(['images', 'category', 'brand'])->where('category_id', $category->id)->where('status', 1)->paginate(12);
        
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        
        return view('frontend.products', compact('products', 'category', 'brands', 'categories'));
    }

    public function subcategoryProducts($slug)
    {
        $subcategory = Subcategory::with('category')->where('slug', $slug)->firstOrFail();
        $products = Product::with(['images', 'category', 'brand'])->where('subcategory_id', $subcategory->id)->where('status', 1)->paginate(12);
        
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        
        return view('frontend.products', compact('products', 'subcategory', 'brands', 'categories'));
    }

    public function childCategoryProducts($slug)
    {
        $childCategory = ChildCategory::with('subcategory.category')->where('slug', $slug)->firstOrFail();
        $products = Product::with(['images', 'category', 'brand'])->where('child_category_id', $childCategory->id)->where('status', 1)->paginate(12);
        
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        
        return view('frontend.products', compact('products', 'childCategory', 'brands', 'categories'));
    }

    public function brandDetails($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $brandProducts = Product::with(['images', 'category', 'brand'])
            ->where('brand_id', $brand->id)
            ->where('status', 1)
            ->take(8)
            ->get();
        
        return view('frontend.brand_details', compact('brand', 'brandProducts'));
    }

    public function brandProducts($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $products = Product::with(['images', 'category', 'brand'])->where('brand_id', $brand->id)->where('status', 1)->paginate(12);
        
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        
        return view('frontend.products', compact('products', 'brand', 'brands', 'categories'));
    }

    public function productDetails($slug)
    {
        $product = Product::with(['brand', 'category', 'subcategory', 'childCategory', 'images'])->where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->take(4)->get();
        
        return view('frontend.product_details', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('short_description', 'LIKE', "%{$query}%")
                  ->orWhere('tags', 'LIKE', "%{$query}%");
            })
            ->paginate(12);
            
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        
        return view('frontend.products', compact('products', 'brands', 'categories', 'query'));
    }

    public function partList(Request $request)
    {
        $query = $request->input('query');
        $isAjax = $request->ajax();

        if (!$query && !$isAjax) {
            $products = collect();
            $brands = Brand::where('status', 1)->get();
            $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
            return view('frontend.part_list', compact('products', 'brands', 'categories', 'query'));
        }

        $products = Product::with(['images', 'category', 'brand'])
            ->where('status', 1);

        if ($query) {
            $products->where(function($q) use ($query) {
                $q->where('name', 'LIKE', "%{$query}%")
                  ->orWhere('part_code', 'LIKE', "%{$query}%")
                  ->orWhere('short_description', 'LIKE', "%{$query}%")
                  ->orWhere('tags', 'LIKE', "%{$query}%");
            });
        } else {
            // If AJAX but no query, maybe return empty or all?
            // User said "by default no product", so if no query, return empty.
            if ($isAjax) {
                $products->where('id', 0); // Force empty
            }
        }

        $products = $products->paginate(20);

        if ($isAjax) {
            return view('frontend.components.part_results_table', compact('products'))->render();
        }
            
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        
        return view('frontend.part_list', compact('products', 'brands', 'categories', 'query'));
    }

    public function enquirySubmit(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email:rfc,dns|max:255',
            'phone'      => 'required|regex:/^[0-9]{10}$/',
            'message'    => 'required|string',
        ], [
            'phone.regex' => 'Please enter a valid 10-digit phone number.',
            'phone.required' => 'Phone number is required.',
        ]);

        $enquiry = Enquiry::create($request->all());

        // Get Admin Email from Settings
        $setting = \App\Models\Setting::first();
        $adminEmail = $setting->admin_email ?? config('mail.from.address');

        // Send Email to Admin
        Mail::to($adminEmail)->send(new AdminEnquiryMail($enquiry));

        // Send Email to User
        Mail::to($enquiry->email)->send(new UserEnquiryMail($enquiry));

        return redirect()->route('thank.you');
    }

    public function thankYou()
    {
        return view('frontend.thank_you');
    }
}
