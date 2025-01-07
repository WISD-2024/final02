<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
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
}
