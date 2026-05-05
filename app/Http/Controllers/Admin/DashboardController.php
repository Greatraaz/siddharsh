<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $brandsCount = Brand::count();
        $categoriesCount = Category::count();
        $subcategoriesCount = Subcategory::count();
        $productsCount = Product::count();
        
        $recentProducts = Product::with('category')->latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'brandsCount',
            'categoriesCount',
            'subcategoriesCount',
            'productsCount',
            'recentProducts'
        ));
    }
}
