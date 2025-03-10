<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Pastikan user sudah login
        if (!$user) {
            return redirect()->route('login');
        }

        // Cek role user
        if ($user && in_array($user->role, ['admin', 'superadmin'])) {
            return $next($request); // Lanjutkan ke URL tujuan
        } elseif ($user->role === 'user') {
            if ($user->premium_type === 'lifetime') {
                // User dengan premium_type lifetime, izinkan akses
                return $next($request);
            }

            // Cek apakah expired
            $expiredDate = Carbon::parse($user->expired);
            if (Carbon::now()->greaterThan($expiredDate)) {
                // Jika expired
                return redirect()->route('home');
            }
        } elseif ($user->role === 'premium') {
            return $next($request);
        }

        // Izinkan akses jika tidak ada masalah
        return redirect()->route('home');
    }
}
