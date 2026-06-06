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
    public function redirectToGoogle(Request $request): RedirectResponse
    {
        $role = $request->query('role', 'pembeli');
        session(['google_auth_role' => $role]);

        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(): RedirectResponse
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $authRole = session('google_auth_role', 'pembeli');
            
            // 🌟 PERBAIKAN 1: Cari user menggunakan kolom 'username' (bukan 'email')
            $user = User::where('username', $googleUser->email)->first();

            if ($user) {
                Auth::login($user);

                if (is_null($user->email_verified_at)) {
                    return redirect()->route('verification.notice');
                }

                return $this->redirectBasedOnDataCompleteness($user);

            } else {
                // 🌟 PERBAIKAN 2: Gunakan kolom 'nama_admin' dan 'username' sesuai struktur DB kalian
                $newUser = User::create([
                    'nama_admin' => $googleUser->name,  // Target MySQL: nama_admin
                    'username'   => $googleUser->email, // Target MySQL: username
                    'role'       => $authRole, 
                    'password'   => Hash::make(Str::random(24)),
                ]);

                event(new Registered($newUser));

                Auth::login($newUser);

                return redirect()->route('verification.notice');
            }

        } catch (Exception $e) {
            // Jika mau debug eror aslinya pas develop, bisa matikan redirect ini dan gunakan: dd($e->getMessage());
            return redirect('/login')->withErrors([
                'email' => 'Gagal masuk menggunakan akun Google. Eror: ' . $e->getMessage(),
            ]);
        }
    }

    private function redirectBasedOnDataCompleteness($user): RedirectResponse
    {
        if ($user->role === 'penjual') {
            if (is_null($user->nama_toko)) {
                return redirect()->route('profile.complete.penjual');
            }
            return redirect()->intended(route('dashboard'));
        } else {
            if (is_null($user->alamat) || is_null($user->no_hp)) {
                return redirect()->route('profile.complete.pembeli');
            }
            return redirect()->intended(route('dashboard.pembeli'));
        }
    }
}