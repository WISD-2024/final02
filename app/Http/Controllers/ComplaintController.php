<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ComplaintController extends Controller
{
    public function dashboard()
    {
        $complaints = Complaint::with('user')->get();
        return view('admin.dashboard', compact('complaints'));
    }

    public function store(Request $request)
    {
        // 驗證並儲存投訴資料
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $complaint = new Complaint();
        $complaint->message = $request->message;
        $complaint->user_id = auth()->id();
        $complaint->save();

        return redirect()->back()->with('success', '您的意見已提交！');
    }
}
