<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouteController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[RouteController::class,"home"]);
Route::prefix('customer')->group(function () {
    Route::get('/login',[RouteController::class,"signIn"])->name('customer.login');
    Route::get('/register',[RouteController::class,"signUp"])->name('customer.register');
});

Route::prefix('admin')->group(function () {
    Route::get('/login',[RouteController::class,"loginAdmin"])->name('admin.login');
    Route::get('/dashboard',[RouteController::class,"dashboard"])->name('admin.dashboard');
});


