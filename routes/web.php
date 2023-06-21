<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductTypeController;

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
    });

    Route::prefix('brands')->group(function () {
        Route::get('/',[BrandsController::class,"index"])->name('brands.index');
        Route::get('/create',[BrandsController::class,"create"])->name('brands.create');
    });

    Route::prefix('products')->group(function () {
        Route::get('/',[ProductsController::class,"index"])->name('products.index');
        Route::get('/create',[ProductsController::class,"create"])->name('products.create');
        Route::get('/edit/{id}',[ProductsController::class,"edit"])->name('products.edit');
    });

    //frontend
    Route::prefix('product_type')->group(function () {
        Route::get('/',[ProductTypeController::class,"index"])->name('product_type.index');
        Route::get('/create',[ProductTypeController::class,"create"])->name('product_type.create');
        Route::get('/edit/{id}',[ProductTypeController::class,"edit"])->name('product_type.edit');
    });

    Route::prefix('review')->group(function () {
        Route::get('/',[ReviewController::class,"index"])->name('review.index');
        Route::get('/create',[ReviewController::class,"create"])->name('review.create');
        Route::get('/edit/{id}',[ReviewController::class,"edit"])->name('review.edit');
});

});


