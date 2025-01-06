<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 確保用戶已登入且為管理員
        if (Auth::check() && Auth::user()->isAdmin()) {
            return $next($request); // 繼續執行請求
        }

        // 否則重定向到首頁
        return redirect('/home');
    }
}
