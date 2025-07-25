<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Kiểm tra nếu user chưa đăng nhập
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Chặn user thường (role = 0), cho phép admin (role = 1)
        if (Auth::user()->role === 0) {
            return redirect()->route('client.pages.home')->with('error', 'Bạn không có quyền truy cập trang admin!');
        }

        return $next($request);
    }
}
