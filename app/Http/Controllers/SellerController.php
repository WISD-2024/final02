<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    // 顯示賣家主頁
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();

        return view('seller.index', compact('products'));
    }

    // 顯示賣家商品創建表單
    public function create()
    {
        return view('seller.create');
    }

    // 儲存賣家商品
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // 假設用戶 ID 是賣家，並且與商品關聯
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => Auth::id(),  // 用戶 ID
        ]);

        return redirect()->route('seller.index')->with('success', 'Product created successfully!');
    }

    // 顯示商品編輯頁面
    public function edit(Product $product)
    {
        // 檢查是否是該賣家的商品
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('seller.index')->with('error', 'You do not have permission to edit this product.');
        }

        return view('seller.edit', compact('product'));
    }

    // 更新賣家的商品
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // 檢查是否是該賣家的商品
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('seller.index')->with('error', 'You do not have permission to update this product.');
        }

        // 更新商品
        $product->update($request->all());

        return redirect()->route('seller.index')->with('success', 'Product updated successfully!');
    }

    // 刪除賣家的商品
    public function destroy(Product $product)
    {
        // 檢查是否是該賣家的商品
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('seller.index')->with('error', 'You do not have permission to delete this product.');
        }

        // 刪除商品
        $product->delete();

        return redirect()->route('seller.index')->with('success', 'Product deleted successfully!');
    }
}