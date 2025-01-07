<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        // 驗證
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $imagePath = null;
    
        // 檢查是否有圖片文件
        if ($request->hasFile('image')) {
            // 儲存圖片到 public/uploads 目錄，並獲得儲存路徑
            $imagePath = $request->file('image')->store('uploads', 'public');
        }
    
        // 儲存商品
        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath, // 儲存圖片路徑
        ]);
    
        return redirect()->route('seller.index')->with('success', '商品已新增！');
    }
    
    // 顯示商品編輯表單
    public function edit(Product $product)
    {
        return view('seller.edit', compact('product'));
    }

    // 更新商品
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 更新圖片
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');

            // 刪除舊圖片（如果需要）
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $product->image = $imagePath;
        }

        // 更新其他欄位
        $product->update($request->only(['name', 'price', 'description']));

        return redirect()->route('seller.index')->with('success', '商品已更新！');
    }
    // 刪除商品
    public function destroy(Product $product)
    {

        $product->delete();

        return redirect()->route('seller.index')->with('success', '商品已刪除!');
    }
}