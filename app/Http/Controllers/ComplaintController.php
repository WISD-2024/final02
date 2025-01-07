<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    // 在 ComplaintController 中新增 store 方法

    public function store(Request $request)
    {
        $request->validate([
            'complaint' => 'required|string|max:1000',
        ]);

        // 創建投訴紀錄
        Complaint::create([
            'user_id' => Auth::id(),
            'complaint' => $request->complaint,
        ]);

        return redirect()->back()->with('success', '您的投訴已提交成功！');
    }

}
