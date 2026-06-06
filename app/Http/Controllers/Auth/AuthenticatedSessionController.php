<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

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
        // BYPASS SAKTI: Ambil baris user/admin pertama yang ada di database kalian
        $user = User::first();

        if ($user) {
            // Paksa Laravel untuk me-login-kan akun ini secara instan tanpa cek password!
            Auth::login($user);
            $request->session()->regenerate();

            // Langsung tembus ke dashboard utama tanpa hambatan verifikasi email
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Tidak ada data user/admin sama sekali di database kamu.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
}

    /**
     * Menampilkan halaman login khusus pembeli.
     */
    public function createPembeli(): View
    {
        // Jika file view login_pembeli belum ada/error, kita tampilkan view login biasa agar tidak crash
        return view()->exists('auth.login_pembeli') ? view('auth.login_pembeli') : view('auth.login');
    }

    /**
     * Memproses login pembeli dan mengarahkan kembali ke halaman jelajahi toko.
     */
    public function storePembeli(Request $request): RedirectResponse
    {
        // Otomatis bypass login pembeli dan arahkan langsung ke halaman aktivitas pembeli
        $user = User::first();
        if ($user) {
            Auth::login($user);
        }
        
        return redirect()->route('dashboard.pembeli');
    }
}


