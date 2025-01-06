<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    // 顯示賣家所有商品
    public function index()
    {
        $products = Product::all();
        return view('seller.index', compact('products'));
    }

    // 顯示創建商品表單
    public function create()
    {
        return view('seller.create');
    }

    // 儲存創建的商品
    public function store(Request $request)
    {
        // 驗證輸入
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);
    
        // 附加當前用戶 ID 到資料中
        $validated['user_id'] = Auth::id();
    
        // 使用 create 方法創建商品
        Product::create($validated);
    
        // 返回成功響應或重定向
        return redirect()->route('seller.index')->with('success', '商品已成功新增！');
    }

    // 顯示商品編輯表單
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('seller.edit', compact('product'));
    }
    // 更新商品
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // 檢查商品是否屬於當前賣家
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('seller.index')->with('error', 'You do not have permission to update this product.');
        }

        $product->update($request->all());

        return redirect()->route('seller.index')->with('success', 'Product updated successfully!');
    }

    // 刪除商品
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('seller.index')->with('success', '商品已刪除');
    }
}