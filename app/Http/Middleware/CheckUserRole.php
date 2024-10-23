<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check()) {
            return redirect('/'); // Redirect jika tidak terautentikasi
        }

        // Cek role pengguna
        if ($role === 'client' && auth()->user() instanceof \App\Models\Client) {
            return $next($request);
        }

        if ($role === 'employee' && auth()->user() instanceof \App\Models\Employee) {
            return $next($request);
        }

        // Jika tidak sesuai, redirect ke halaman yang sesuai
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
