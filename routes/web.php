<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', [ProductController::class, 'index']);  // 顯示商品列表給訪客
//Route::get('login', [Auth\LoginController::class, 'showLoginForm']); //訪客進入登入畫面
//Route::post('login', [Auth\LoginController::class, 'login']); //訪客登入

Route::middleware(['role:seller'])->group(function () {
Route::get('seller/dashboard', [SellerController::class, 'dashboard']);
Route::resource('seller/products', ProductController::class);}); //賣家管理商品

//Route::middleware(['role:admin'])->group(function () {
//Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
//Route::resource('admin/users', UserController::class);
//Route::resource('admin/orders', OrderController::class);
//});

use App\Http\Controllers\SellerController;

Route::prefix('seller')->middleware(['auth', 'role:seller'])->group(function () {
    // 賣家主頁（顯示賣家的商品列表）
    Route::get('/', [SellerController::class, 'index'])->name('seller.index');

    // 商品創建頁面
    Route::get('create', [SellerController::class, 'create'])->name('seller.create');

    // 儲存商品
    Route::post('store', [SellerController::class, 'store'])->name('seller.store');

    // 編輯商品頁面
    Route::get('edit/{product}', [SellerController::class, 'edit'])->name('seller.edit');

    // 更新商品
    Route::put('update/{product}', [SellerController::class, 'update'])->name('seller.update');

    // 刪除商品
    Route::delete('destroy/{product}', [SellerController::class, 'destroy'])->name('seller.destroy');
});