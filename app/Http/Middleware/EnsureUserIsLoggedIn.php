<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsLoggedIn
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // JIKA USER BELUM LOGIN: Hadang dan lempar ke halaman register
       if (!Auth::check()) {
    // Diarahkan ke halaman login khusus pembeli, bukan login UMKM lagi
    return redirect()->route('pembeli.login')->with('warning', 'Silakan masuk ke akun pembeli Anda terlebih dahulu!');
}

        // JIKA SUDAH LOGIN: Izinkan melanjutkan aksi (masuk keranjang / chat)
        return $next($request);
    }
}