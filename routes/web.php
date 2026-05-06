<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/brands', [FrontendController::class, 'brands'])->name('brands');
Route::get('/categories', [FrontendController::class, 'categories'])->name('categories');
Route::get('/sub-categories', [FrontendController::class, 'subcategories'])->name('subcategories');
Route::get('/child-categories', [FrontendController::class, 'childCategories'])->name('childcategories');
Route::get('/category/{slug}', [FrontendController::class, 'categoryProducts'])->name('category.products');
Route::get('/subcategory/{slug}', [FrontendController::class, 'subcategoryProducts'])->name('subcategory.products');
Route::get('/child-category/{slug}', [FrontendController::class, 'childCategoryProducts'])->name('childcategory.products');
Route::get('/product/{slug}', [FrontendController::class, 'productDetails'])->name('product.details');
Route::get('/brand/{slug}', [FrontendController::class, 'brandProducts'])->name('brand.products');
Route::get('/search', [FrontendController::class, 'search'])->name('search');
Route::post('/enquiry/submit', [FrontendController::class, 'enquirySubmit'])->name('enquiry.submit');
Route::get('/thank-you', [FrontendController::class, 'thankYou'])->name('thank.you');

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    // Login Page
    Route::get('/admin/login', [AuthController::class, 'login'])
        ->name('login');

    // Login Submit
    Route::post('/admin/login', [AuthController::class, 'loginSubmit'])
        ->name('login.submit');

    // Register Page
    Route::get('/admin/register', [AuthController::class, 'register'])
        ->name('register');

    // Register Submit
    Route::post('/admin/register', [AuthController::class, 'registerSubmit'])
        ->name('register.submit');

});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');


        /*
        |--------------------------------------------------------------------------
        | Brands
        |--------------------------------------------------------------------------
        */

         Route::resource('brands', BrandController::class);


        /*
        |--------------------------------------------------------------------------
        | Categories
        |--------------------------------------------------------------------------
        */

        Route::resource('categories', CategoryController::class);


        /*
        |--------------------------------------------------------------------------
        | Subcategories & Child Categories
        |--------------------------------------------------------------------------
        */

        Route::resource('subcategories', SubcategoryController::class);
        Route::resource('childcategories', ChildCategoryController::class);

        // AJAX Routes for Dependent Dropdowns
        Route::get('/get-subcategories/{category_id}', [CategoryController::class, 'getSubcategories']);
        Route::get('/get-childcategories/{subcategory_id}', [SubcategoryController::class, 'getChildcategories']);


        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        Route::resource('products', ProductController::class);

        /*
        |--------------------------------------------------------------------------
        | Access Control
        |--------------------------------------------------------------------------
        */

        Route::resource('roles', RoleController::class);
        Route::resource('users', UserController::class);

        /*
        |--------------------------------------------------------------------------
        | Enquiries
        |--------------------------------------------------------------------------
        |*/
        Route::get('/enquiries', [\App\Http\Controllers\Admin\EnquiryController::class, 'index'])->name('enquiries.index');
        Route::get('/enquiries/{id}', [\App\Http\Controllers\Admin\EnquiryController::class, 'show'])->name('enquiries.show');
        Route::delete('/enquiries/{id}', [\App\Http\Controllers\Admin\EnquiryController::class, 'destroy'])->name('enquiries.destroy');
        Route::post('/enquiries/{id}/mark-as-read', [\App\Http\Controllers\Admin\EnquiryController::class, 'markAsRead'])->name('enquiries.mark-as-read');


        /*
        |--------------------------------------------------------------------------
        | Profile
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

        /*
        |--------------------------------------------------------------------------
        | General Settings
        |--------------------------------------------------------------------------
        */

        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');


        /*
        |--------------------------------------------------------------------------
        | Logout
        |--------------------------------------------------------------------------
        */

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');

});


/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);
});