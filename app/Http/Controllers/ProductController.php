<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Seller;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('search');
    
        // 根據名稱搜尋商品
        $products = Product::where('name', 'like', '%' . $keyword . '%')->get();
    
        // 返回搜尋結果至視圖
        return view('products.search', compact('products', 'keyword'));
    }

    public function show(Product $product)
    {
        // 顯示商品頁面，傳遞商品資料到視圖
        return view('products.show', compact('product'));
    }

    public function by_seller(Seller $seller)
    {
        // 查詢該賣家所有的商品
        $products = $seller->products;

        // 傳遞商品資料至視圖
        return view('products.by_seller', compact('seller', 'products'));
    }
}
