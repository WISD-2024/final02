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

Route::middleware(['auth', 'role:seller'])->prefix('seller')->group(function () {
    // 顯示賣家主頁（商品列表頁面）
    Route::get('/', [SellerController::class, 'index'])->name('seller.index');

    // 顯示創建商品表單
    Route::get('create', [SellerController::class, 'create'])->name('seller.create');

    // 儲存商品
    Route::post('store', [SellerController::class, 'store'])->name('seller.store');

    // 顯示編輯商品表單
    Route::get('edit/{product}', [SellerController::class, 'edit'])->name('seller.edit');

    // 更新商品
    Route::put('update/{product}', [SellerController::class, 'update'])->name('seller.update');

    // 刪除商品
    Route::delete('destroy/{product}', [SellerController::class, 'destroy'])->name('seller.destroy');
});

Route::get('/seller/create', function () {
    return view('seller.create');
});
Route::get('/seller/edit', function () {
    return view('seller.edit');
});
Route::get('/seller/index', function () {
    return view('seller.index');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/seller/create', [App\Http\Controllers\SellerController::class, 'create'])->name('seller.create');
    Route::post('/seller', [App\Http\Controllers\SellerController::class, 'store'])->name('seller.store');
    Route::get('/seller', [App\Http\Controllers\SellerController::class, 'index'])->name('seller.index');
}); 
