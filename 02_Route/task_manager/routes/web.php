<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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



//Tạo 1 nhóm route với tiền tố customer
Route::prefix('customer')->group(function () {
    Route::get('index', function () {
        // Hiển thị danh sách khách hàng
        return view('modules.customer.index');
    });

    Route::get('detail/{id}', function($id) {
        return view('modules.customer.detail');
    });
    Route::get('edit/{id}', function($id) {
        return view('modules.customer.edit');
    });
    Route::get('delete/{id}', function($id) {
        return view('modules.customer.delete');
    });

    Route::get('create', function () {
        // Hiển thị Form tạo khách hàng
    });

    Route::post('store', function () {
        // Xử lý lưu dữ liệu tạo khách hàng thong qua phương thức POST từ form
    });

    Route::get('{id}/show', function () {
        // Hiển thị thông tin chi tiết khách hàng có mã định danh id
    });

    Route::get('{id}/edit', function () {
        // Hiển thị Form chỉnh sửa thông tin khách hàng
    });

    Route::patch('{id}/update', function () {
        // xử lý lưu dữ liệu thông tin khách hàng được chỉnh sửa thông qua PATCH từ form
    });

    Route::delete('{id}', function () {
        // Xóa thông tin dữ liệu khách hàng
    });
});
Route::get('customers', [CustomerController::class, 'index']);


Route::prefix('tasks')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('store', [TaskCotroller::class, 'store'])->name('tasks.store');
    Route::get('{taskId}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('{taskId}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('{taskId}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('{photo}', [TaskCOntroller::class, 'destroy'])->name('tasks.destroy');
});