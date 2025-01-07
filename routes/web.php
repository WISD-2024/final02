<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplaintController;
use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
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
    $products = Product::all();
    return view('welcome', compact('products'));
});

Route::get('/dashboard', function () {
    $products = Product::all();
    return view('welcome', compact('products'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//賣家功能

    Route::get('seller/dashboard', [SellerController::class, 'dashboard']);
    Route::resource('seller/products', ProductController::class);



    Route::get('/seller/create', [SellerController::class, 'index'])->name('seller.index');

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

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
Route::get('/admin', [AdminController::class, 'dashboard'])->middleware('auth', 'admin');




//搜尋產品
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');

//商品詳細
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');

//商品列表
Route::get('products/by_seller/{seller}', [ProductController::class, 'by_seller'])->name('products.index');

//加入購物車
Route::post('/cart_items', [CartItemController::class, 'store'])->name('cart_items.store');



//刪除購物車
Route::delete('/cart_items/{cart_item}', [CartItemController::class, 'destroy'])->name('cart_items.destroy');

//訂單結帳
Route::get('order/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');

//查看訂單
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

//取消訂單
Route::patch('orders/{order}/cancel', [OrderController::class, 'cancel'])->name('orders.cancel');
