<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
     * 顯示首頁
     *
     * @return \Illuminate\View\Vieww
     */
    public function index()
    {
        return view('index');
    }
}
