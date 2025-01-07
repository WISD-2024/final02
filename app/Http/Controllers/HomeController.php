<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
class HomeController extends Controller
{
    /*
     * 顯示首頁
     *
     * @return \Illuminate\View\Vieww
     */
    public function index()
    {
        $cartItems = CartItem::all();

        // 將數據傳遞給視圖
        return view('index', compact('cartItems'));
    }
}
