<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function store(Request $request)
    {
        // 驗證輸入
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // 儲存意見
        $complaint = new Complaint();
        $complaint->message = $request->message;
        $complaint->user_id = auth()->id();  // 如果用戶已登入，儲存其ID
        $complaint->save();

        return redirect()->back()->with('success', '您的意見已提交！');
    }

}
