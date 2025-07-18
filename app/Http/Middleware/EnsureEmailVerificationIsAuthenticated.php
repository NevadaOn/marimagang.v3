<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmailVerificationIsAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            session()->put('url.intended', $request->fullUrl());
            return redirect()->route('login');
        }

        return $next($request);
    }
}
