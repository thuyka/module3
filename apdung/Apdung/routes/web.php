<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers;

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
Route::prefix('customers')->group(function () {
    Route::get('index', [CustomerController::class, "index"])->name('customers.index');
    Route::get('/create', [CustomerController::class, "creat"])->name('customers.create');
    Route::get('/edit{id}', [CustomerController::class, "edit"])->name('customers.edit');
    Route::delete('/destroy{id}', [CustomerController::class, "destroy"])->name('customers.destroy');
    Route::post('/store', [CustomerController::class, "store"])->name('customers.store');
    Route::put('/update{id}', [CustomerController::class, "update"])->where(['id'=>'[0-9'])->name('customers.update');
});
Route::resource('photo', PhotoController::class);
//route thực hiện chức năng định tuyến đãn đường cho các HTTP request tới nơi mình muốn đến
