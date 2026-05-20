<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class GoogleController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman login milik Google berdasarkan role penekan tombol.
     */
    public function redirectToGoogle(Request $request): RedirectResponse
    {
        // Tangkap parameter role dari tombol (penjual atau pembeli)
        $role = $request->query('role', 'pembeli');
        
        // Simpan tipe role ke dalam session agar tidak hilang saat pergi ke server Google
        session(['google_auth_role' => $role]);

        return Socialite::driver('google')->redirect();
    }

    /**
     * Menangkap data pengguna dari Google setelah sukses login.
     */
    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            // Ambil kembali data role yang tadi disimpan di session (default: pembeli)
            $authRole = session('google_auth_role', 'pembeli');
            
            if ($authRole === 'penjual') {
                // --- JALUR PENJUAL / ADMIN (Tabel admin) ---
                $findAdmin = User::where('username', $googleUser->email)->first();

                if ($findAdmin) {
                    Auth::login($findAdmin);
                    
                    // Cek jika belum verifikasi email inbox
                    if (is_null($findAdmin->email_verified_at)) {
                        return redirect()->route('verification.notice');
                    }
                    return redirect()->intended(route('dashboard'));
                } else {
                    // Daftarkan Admin Baru (Belum Terverifikasi)
                    $newAdmin = User::create([
                        'nama_admin' => $googleUser->name,
                        'username'   => $googleUser->email,
                        'password'   => Hash::make(Str::random(24)),
                    ]);

                    // Pemicu event Laravel untuk mengirim email verifikasi ke inbox
                    event(new Registered($newAdmin));

                    Auth::login($newAdmin);
                    return redirect()->route('verification.notice');
                }
            } else {
                // --- JALUR PEMBILI (Menggunakan fallback session / simulasi proteksi) ---
                // Untuk pembeli, arahkan ke rute jelajah toko dengan session terautentikasi
                session(['pembeli_logged_in' => true, 'pembeli_name' => $googleUser->name]);
                return redirect()->route('dashboard.pembeli');
            }

        } catch (Exception $e) {
            return redirect('/')->withErrors([
                'email' => 'Gagal masuk menggunakan akun Google, silakan coba lagi.',
            ]);
        }
    }
}