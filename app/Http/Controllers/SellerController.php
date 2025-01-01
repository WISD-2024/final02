<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:seller'); // 僅賣家可訪問
    }

    // 顯示賣家所有商品
    public function index()
    {
        $products = Product::where('user_id', Auth::id())->get();
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
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => Auth::id(),  // 取得當前用戶（賣家）ID
        ]);

        return redirect()->route('seller.index')->with('success', 'Product created successfully!');
    }

    // 顯示商品編輯表單
    public function edit(Product $product)
    {
        // 檢查商品是否屬於當前賣家
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('seller.index')->with('error', 'You do not have permission to edit this product.');
        }

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
    public function destroy(Product $product)
    {
        // 檢查商品是否屬於當前賣家
        if ($product->user_id !== Auth::id()) {
            return redirect()->route('seller.index')->with('error', 'You do not have permission to delete this product.');
        }

        $product->delete();

        return redirect()->route('seller.index')->with('success', 'Product deleted successfully!');
    }
}