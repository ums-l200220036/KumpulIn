<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.home');
        }

        if (Auth::guard('dosen')->check()) {
            return redirect()->route('dosen.dashboard');
        }

        if (Auth::guard('mahasiswa')->check()) {
            return redirect()->route('mahasiswa.dashboard');
        }

        return $next($request);
    }
}
