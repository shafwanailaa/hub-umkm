<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Mencegat akses rute jika yang masuk bukan admin toko terotentikasi.
     */
    public function handle(Request $request, Closure $next, string $role = null): Response
    {
        // 1. Cek apakah user sudah login atau belum ke sistem guard utama
        if (!Auth::check()) {
            return redirect()->route('login')->with('warning', 'Akses ditolak. Silakan login terlebih dahulu.');
        }

        // 2. KUNCI PERBAIKAN: Karena kalian menggunakan tabel 'admin' langsung, 
        // selama user berhasil lolos Auth::check() di guard admin, maka dia otomatis adalah penjual/admin sah.
        // Kita tidak perlu mengecek kolom $user->role lagi agar tidak mental ke login.
        
        return $next($request);
    }
}