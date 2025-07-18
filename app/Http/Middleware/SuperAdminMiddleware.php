<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('admin')->check() || Auth::guard('admin')->user()->role !== 'superadmin') {
            abort(403, 'Akses ditolak. Hanya super admin yang dapat mengakses halaman ini.');
        }

        Auth::shouldUse('admin');

        return $next($request);
    }
}
