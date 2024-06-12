<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { // Kiểm tra nếu người dùng không phải là admin (role != 0), chuyển hướng về trang chính
        if (Auth::check() && Auth::user()->role != 0) {
            return redirect('/'); // Chuyển hướng về trang chính hoặc trang nào đó khác
        }
        return $next($request);
    }
}
