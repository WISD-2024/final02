<?php

namespace App\Http\Controllers;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 建構函數，保護後台頁面
    public function __construct()
    {
        $this->middleware('auth');  // 確保用戶已經登入
        $this->middleware('admin'); // 使用中間件檢查是否為管理員
    }

    // 顯示後台主頁
    public function index()
    {
        return view('admin.dashboard'); // 你可以創建一個 admin.dashboard 視圖
    }
// AdminController 顯示所有投訴
//    public function showComplaints()
//    {
//        $complaints = Complaint::with('user')->get(); // 取得所有投訴紀錄，並帶入用戶資料
//
//        return view('admin.complaints', compact('complaints'));
//    }
    // 其他管理員功能
    public function manageUsers()
    {
        // 邏輯來管理用戶，例如顯示所有用戶
        return view('admin.manage_users');
    }
    public function dashboard()
    {
        $complaints = Complaint::with('user')->get();  // 載入用戶資料
        dd($complaints);  // 檢查資料

        return view('admin.dashboard', compact('complaints'));
    }


    // 其他功能
    // public function otherAdminFunction() { ... }
}
