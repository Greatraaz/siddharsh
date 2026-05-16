<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Solution;
use App\Models\Subcategory;
use App\Models\Enquiry;
use App\Models\Newsletter;
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
        $latestBrands = Brand::where('status', 1)->latest()->take(6)->get();
        
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
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        $solutions = Solution::where('status', 1)->get();
        
        $products = Product::with(['images', 'category', 'brand'])
            ->where('category_id', $category->id)
            ->where('status', 1)
            ->when(request('solution'), function($q) {
                $q->whereHas('solutions', function($sq) {
                    $sq->where('slug', request('solution'));
                });
            })
            ->paginate(12)->withQueryString();

        return view('frontend.products', compact('products', 'category', 'brands', 'categories', 'solutions'));
    }

    public function subcategoryProducts($slug)
    {
        $subcategory = Subcategory::with('category')->where('slug', $slug)->firstOrFail();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        $solutions = Solution::where('status', 1)->get();

        $products = Product::with(['images', 'category', 'brand'])
            ->where('subcategory_id', $subcategory->id)
            ->where('status', 1)
            ->when(request('solution'), function($q) {
                $q->whereHas('solutions', function($sq) {
                    $sq->where('slug', request('solution'));
                });
            })
            ->paginate(12)->withQueryString();
        
        return view('frontend.products', compact('products', 'subcategory', 'brands', 'categories', 'solutions'));
    }

    public function childCategoryProducts($slug)
    {
        $childCategory = ChildCategory::with('subcategory.category')->where('slug', $slug)->firstOrFail();
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        $solutions = Solution::where('status', 1)->get();

        $products = Product::with(['images', 'category', 'brand'])
            ->where('child_category_id', $childCategory->id)
            ->where('status', 1)
            ->when(request('solution'), function($q) {
                $q->whereHas('solutions', function($sq) {
                    $sq->where('slug', request('solution'));
                });
            })
            ->paginate(12)->withQueryString();
        
        return view('frontend.products', compact('products', 'childCategory', 'brands', 'categories', 'solutions'));
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
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        $solutions = Solution::where('status', 1)->get();

        $products = Product::with(['images', 'category', 'brand'])
            ->where('brand_id', $brand->id)
            ->where('status', 1)
            ->when(request('solution'), function($q) {
                $q->whereHas('solutions', function($sq) {
                    $sq->where('slug', request('solution'));
                });
            })
            ->paginate(12)->withQueryString();
        
        return view('frontend.products', compact('products', 'brand', 'brands', 'categories', 'solutions'));
    }

    public function productDetails($slug)
    {
        $product = Product::with(['brand', 'category', 'subcategory', 'childCategory', 'images', 'solutions'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();
        
        return view('frontend.product_details', compact('product', 'relatedProducts'));
    }

    public function solutions()
    {
        $solutions = Solution::where('status', 1)->paginate(12);
        return view('frontend.solutions', compact('solutions'));
    }

    public function solutionDetails($slug)
    {
        $solution = Solution::with(['products' => function($query) {
            $query->where('status', 1)->with(['images', 'brand', 'category', 'subcategory'])->take(12);
        }])->where('slug', $slug)->where('status', 1)->firstOrFail();

        $relatedProducts = $solution->products;

        $brands = $relatedProducts->pluck('brand')->filter()->unique('id');
        $categories = $relatedProducts->pluck('category')->filter()->unique('id');

        $featuredProducts = $solution->products()->where('status', 1)->where('featured', 1)
            ->with(['images', 'brand'])
            ->take(4)
            ->get();

        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::with(['images', 'brand'])->where('status', 1)->where('featured', 1)->take(4)->get();
        }

        return view('frontend.solution_detail', compact('solution', 'relatedProducts', 'brands', 'categories', 'featuredProducts'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();
        $solutions = Solution::where('status', 1)->get();

        $products = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->when($query, function($q) use ($query) {
                $q->where(function($sub) use ($query) {
                    $sub->where('name', 'LIKE', "%{$query}%")
                        ->orWhere('variant', 'LIKE', "%{$query}%")
                        ->orWhere('part_code', 'LIKE', "%{$query}%")
                        ->orWhere('part_number', 'LIKE', "%{$query}%")
                        ->orWhere('short_description', 'LIKE', "%{$query}%")
                        ->orWhere('tags', 'LIKE', "%{$query}%")
                        ->orWhereHas('brand', function($brandQuery) use ($query) {
                            $brandQuery->where('name', 'LIKE', "%{$query}%");
                        })
                        ->orWhereHas('category', function($categoryQuery) use ($query) {
                            $categoryQuery->where('name', 'LIKE', "%{$query}%");
                        });
                });
            })
            ->when(request('solution'), function($q) {
                $q->whereHas('solutions', function($sq) {
                    $sq->where('slug', request('solution'));
                });
            })
            ->paginate(12)->withQueryString();
        
        return view('frontend.products', compact('products', 'brands', 'categories', 'query', 'solutions'));
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
                  ->orWhere('variant', 'LIKE', "%{$query}%")
                  ->orWhere('part_code', 'LIKE', "%{$query}%")
                  ->orWhere('part_number', 'LIKE', "%{$query}%")
                  ->orWhere('short_description', 'LIKE', "%{$query}%")
                  ->orWhere('tags', 'LIKE', "%{$query}%")
                  ->orWhereHas('brand', function($sub) use ($query) {
                      $sub->where('name', 'LIKE', "%{$query}%");
                  })
                  ->orWhereHas('category', function($sub) use ($query) {
                      $sub->where('name', 'LIKE', "%{$query}%");
                  });
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

    public function contact()
    {
        return view('frontend.contact');
    }

    public function enquirySubmit(Request $request)
    {
        $request->validate([
            'product_id' => 'nullable|exists:products,id',
            'brand_id'   => 'nullable|exists:brands,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email:rfc,dns|max:255',
            'phone'      => 'required|regex:/^[0-9]{10}$/',
            'subject'    => 'nullable|string|max:255',
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

    public function getApiSubcategories($categoryId)
    {
        $subcategories = Subcategory::withCount('childCategories')
            ->where('category_id', $categoryId)
            ->where('status', 1)
            ->get();
            
        return response()->json($subcategories);
    }

    public function getApiChildcategories($subcategoryId)
    {
        $childCategories = ChildCategory::where('subcategory_id', $subcategoryId)
            ->where('status', 1)
            ->get(['id', 'name', 'slug']);
            
        return response()->json($childCategories);
    }

    public function futureProducts()
    {
        $brands = Brand::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        $solutions = Solution::where('status', 1)->get();
        
        $products = Product::with(['images', 'category', 'brand'])
            ->where('is_future', 1)
            ->where('status', 1)
            ->when(request('solution'), function($q) {
                $q->whereHas('solutions', function($sq) {
                    $sq->where('slug', request('solution'));
                });
            })
            ->paginate(12)->withQueryString();
            
        $pageTitle = "Future Products";
        
        return view('frontend.products', compact('products', 'brands', 'categories', 'pageTitle', 'solutions'));
    }
    public function getApiFeaturedProducts()
    {
        $products = Product::where('featured', 1)
            ->where('status', 1)
            ->get(['id', 'name', 'slug']);
            
        return response()->json($products);
    }

    // SEO Landing Pages
    public function panduitLanding()
    {
        $panduitProducts = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->whereHas('brand', function($query) {
                $query->where('name', 'LIKE', '%panduit%');
            })
            ->take(8)
            ->get();

        $structuredCablingProducts = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->where('name', 'LIKE', '%cabl%')
            ->take(8)
            ->get();

        return view('frontend.landing.panduit', compact('panduitProducts', 'structuredCablingProducts'));
    }

    public function legrandLanding()
    {
        $legrandProducts = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->whereHas('brand', function($query) {
                $query->where('name', 'LIKE', '%legrand%');
            })
            ->take(8)
            ->get();

        $electricalProducts = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->where('name', 'LIKE', '%electrical%')
            ->take(8)
            ->get();

        return view('frontend.landing.legrand', compact('legrandProducts', 'electricalProducts'));
    }

    public function structuredCablingLanding()
    {
        $cablingProducts = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->where(function($query) {
                $query->where('name', 'LIKE', '%cabl%')
                      ->orWhere('name', 'LIKE', '%fiber%')
                      ->orWhere('name', 'LIKE', '%optic%');
            })
            ->take(12)
            ->get();

        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();

        return view('frontend.landing.structured-cabling', compact('cablingProducts', 'brands', 'categories'));
    }

    public function datacenterLanding()
    {
        $datacenterProducts = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->where(function($query) {
                $query->where('name', 'LIKE', '%datacenter%')
                      ->orWhere('name', 'LIKE', '%rack%')
                      ->orWhere('name', 'LIKE', '%server%')
                      ->orWhere('name', 'LIKE', '%cable management%');
            })
            ->take(12)
            ->get();

        $brands = Brand::where('status', 1)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->get();

        return view('frontend.landing.datacenter', compact('datacenterProducts', 'brands', 'categories'));
    }

    public function itInfrastructureLanding()
    {
        $infrastructureProducts = Product::with(['images', 'category', 'brand'])
            ->where('status', 1)
            ->where('featured', 1)
            ->take(16)
            ->get();

        $brands = Brand::where('status', 1)->take(8)->get();
        $categories = Category::with('subcategories.childCategories')->where('status', 1)->take(6)->get();
        $solutions = Solution::where('status', 1)->take(4)->get();

        return view('frontend.landing.it-infrastructure', compact('infrastructureProducts', 'brands', 'categories', 'solutions'));
    }

    public function newsletterSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $exists = Newsletter::where('email', $request->email)->first();
        if ($exists) {
            return response()->json([
                'status'  => 'info',
                'message' => 'You are already subscribed to our newsletter!'
            ]);
        }

        Newsletter::create([
            'email'  => $request->email,
            'status' => 1
        ]);

        // Note: You can integrate Mailchimp here later using an API or a package like spatie/laravel-newsletter
        
        return response()->json([
            'status'  => 'success',
            'message' => 'Thank you for subscribing to our newsletter!'
        ]);
    }
}
