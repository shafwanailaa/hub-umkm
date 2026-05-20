<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view (Untuk UMKM / Penjual).
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request (Untuk UMKM / Penjual).
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Tangkap input login dari form. 
        // Catatan: Jika name="email" di form login kalian belum diganti, sesuaikan menjadi:
        // $credentials = ['username' => $request->email, 'password' => $request->password];
        $credentials = [
            'username' => $request->input('username') ?? $request->input('email'),
            'password' => $request->input('password')
        ];

        // 2. Jalankan proses pencocokan data ke tabel admin
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Loloskan langsung masuk ke halaman dashboard admin utama
            return redirect()->route('dashboard');
        }

        // 3. Jika gagal cocok, kembalikan ke form dengan pesan error
        return back()->withErrors([
            'email' => 'Username atau password admin yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Menampilkan halaman login khusus pembeli.
     */
    public function createPembeli(): View
    {
        return view('auth.login_pembeli');
    }

    /**
     * Memproses login pembeli dan mengarahkan kembali ke halaman jelajahi toko.
     */
    public function storePembeli(Request $request): RedirectResponse
    {
        // Fitur pembeli dinonaktifkan sementara sesuai instruksi break
        return redirect()->route('dashboard.pembeli');
    }
}