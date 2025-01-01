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