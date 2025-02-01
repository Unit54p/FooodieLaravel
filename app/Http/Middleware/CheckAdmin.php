<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect('/');
        }

        // Periksa apakah role user adalah 'admin'
        if (Auth::user()->role !== 'admin') {
            return redirect('/'); // Redirect ke home jika bukan admin
        }

        return $next($request);
    }
}
