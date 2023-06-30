<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\ProductColorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

//authenticate user
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

//all views
Route::get('/',[RouteController::class,"home"]);
Route::prefix('products')->group(function () {
    Route::get('/',[RouteController::class,"products"])->name('products');
    Route::get('/{id}',[RouteController::class,"productDetail"])->name('product.detail');
});
Route::post('/subscribe',[SubscribeController::class,"store"])->name('subscribe.store');

//api
Route::post('/addToCart',[ApiController::class,"addToCart"])->name('addToCart');;

Route::prefix('customer')->group(function () {
    Route::get('/login',[RouteController::class,"signIn"])->name('customer.login');
    Route::post('/auth',[RouteController::class,"customerAuth"])->name('customer.auth');
    Route::get('/register',[RouteController::class,"signUp"])->name('customer.register');
    Route::post('/register',[RouteController::class,"customerRegister"])->name('customer.register');
});

//admin views
Route::get('/admin/login',[RouteController::class,"loginAdmin"])->name('admin.login');
Route::post('/admin/auth',[RouteController::class,"customerAuth"])->name('admin.auth');

//admin login
Route::prefix('admin')->middleware('admin_auth')->group(function () {
    Route::get('/dashboard',[RouteController::class,"dashboard"])->name('admin.dashboard');

    Route::prefix('category')->group(function () {
        Route::get('/',[CategoryController::class,"index"])->name('category.index');
        Route::get('/create',[CategoryController::class,"create"])->name('category.create');
        Route::post('/store',[CategoryController::class,"store"])->name('category.store');
        Route::post('/update/{id}',[CategoryController::class,"update"])->name('category.update');
        Route::delete('/delete/{id}',[CategoryController::class,"destroy"])->name('category.destroy');
    });

    Route::prefix('sub-category')->group(function () {
        Route::get('/',[SubCategoryController::class,"index"])->name('subCategory.index');
        Route::get('/create',[SubCategoryController::class,"create"])->name('subCategory.create');
        Route::post('/store',[SubCategoryController::class,"store"])->name('subCategory.store');
        Route::post('/update/{id}',[SubCategoryController::class,"update"])->name('subCategory.update');
        Route::delete('/delete/{id}',[SubCategoryController::class,"destroy"])->name('subCategory.destroy');
    });

    Route::prefix('product-color')->group(function () {
        Route::get('/',[ProductColorController::class,"index"])->name('productColor.index');
        Route::get('/create',[ProductColorController::class,"create"])->name('productColor.create');
        Route::post('/store',[ProductColorController::class,"store"])->name('productColor.store');
        Route::post('/update/{id}',[ProductColorController::class,"update"])->name('productColor.update');
        Route::delete('/delete/{id}',[ProductColorController::class,"destroy"])->name('productColor.destroy');
    });

    Route::prefix('brands')->group(function () {
        Route::get('/',[BrandsController::class,"index"])->name('brands.index');
        Route::get('/create',[BrandsController::class,"create"])->name('brands.create');
        Route::post('/store',[BrandsController::class,"store"])->name('brands.store');
        Route::get('/edit/{id}',[BrandsController::class,"edit"])->name('brands.edit');
        Route::post('/update/{id}',[BrandsController::class,"update"])->name('brands.update');
        Route::delete('/delete/{id}',[BrandsController::class,"destroy"])->name('brands.destroy');
    });

    Route::prefix('products')->group(function () {
        Route::get('/',[ProductsController::class,"index"])->name('products.index');
        Route::get('/create',[ProductsController::class,"create"])->name('products.create');
        Route::post('/store',[ProductsController::class,"store"])->name('products.store');
        Route::get('/edit/{id}',[ProductsController::class,"edit"])->name('products.edit');
        Route::post('/update/{id}',[ProductsController::class,"update"])->name('products.update');
        Route::delete('/delete/{id}',[ProductsController::class,"destroy"])->name('products.destroy');
    });

    //frontend
    Route::prefix('product-type')->group(function () {
        Route::get('/',[ProductTypeController::class,"index"])->name('product_type.index');
        Route::get('/create',[ProductTypeController::class,"create"])->name('product_type.create');
        Route::post('/store',[ProductTypeController::class,"store"])->name('product_type.store');
        Route::get('/edit/{id}',[ProductTypeController::class,"edit"])->name('product_type.edit');
        Route::post('/update/{id}',[ProductTypeController::class,"update"])->name('product_type.update');
        Route::delete('/delete/{id}',[ProductTypeController::class,"destroy"])->name('product_type.destroy');
    });

    Route::prefix('review')->group(function () {
        Route::get('/',[ReviewController::class,"index"])->name('review.index');
        Route::get('/create',[ReviewController::class,"create"])->name('review.create');
        Route::post('/store',[ReviewController::class,"store"])->name('review.store');
        Route::get('/edit/{id}',[ReviewController::class,"edit"])->name('review.edit');
        Route::post('/update/{id}',[ReviewController::class,"update"])->name('review.update');
        Route::delete('/delete/{id}',[ReviewController::class,"destroy"])->name('review.destroy');
    });

    Route::prefix('orders')->group(function () {
        Route::get('/',[OrderController::class,"index"])->name('orders.index');
    });

    Route::prefix('payments')->group(function () {
        Route::get('/',[UserPaymentController::class,"index"])->name('payments.index');
    });

    Route::prefix('users')->group(function () {
        Route::get('/',[UserController::class,"index"])->name('users.index');
        Route::delete('delete/{id}',[UserController::class,"destroy"])->name('users.destroy');
    });

    Route::prefix('subscriber')->group(function () {
        Route::get('/',[SubscribeController::class,"index"])->name('subscriber.index');
        Route::delete('delete/{id}',[SubscribeController::class,"destroy"])->name('subscriber.destroy');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/',[ContactController::class,"index"])->name('contact.index');
        Route::delete('delete/{id}',[ContactController::class,"destroy"])->name('contact.destroy');
    });

    Route::prefix('seo')->group(function (){
        Route::get('/',[SEOController::class,"index"])->name('seo.index');
    });

});


