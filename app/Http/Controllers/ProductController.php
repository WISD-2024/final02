<?php

namespace App\Http\Controllers;

use App\Models\Product;  // 引入 Product 模型
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 顯示所有商品
    public function index()
    {
        $products = Product::all();  // 取得所有商品
        return view('welcome', compact('products'));  // 傳遞給視圖
    }
}