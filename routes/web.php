<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//賣家功能
Route::middleware(['role:seller'])->group(function () {
    Route::get('seller/dashboard', [SellerController::class, 'dashboard']);
    Route::resource('seller/products', ProductController::class);
});
//賣家頁面路由
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