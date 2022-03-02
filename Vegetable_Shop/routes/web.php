<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//trang chu

    Route::get('/', [HomeController::class, 'home']);
    Route::get('/productdetail/{id}', [HomeController::class, 'productdetail'])->name('home.productdetail');
    Route::get('cart', [HomeController::class, 'cart']);




//trang admin
Route::get('/admin', function () {
    return view('backend.admin.home');
})->name('home');
Route::prefix('/admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('order', OrderController::class);
    Route::resource('login', AdminController::class);

});