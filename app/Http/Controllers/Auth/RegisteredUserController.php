<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view for Penjual/UMKM.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request for Penjual/UMKM (Tabel admin).
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Validasi input dengan mengecek keunikan data pada kolom 'username' di tabel 'admin'
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:admin,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 2. Simpan data baru sesuai dengan struktur kolom asli tabel admin kalian
        $user = User::create([
            'nama_admin' => $request->name,       // Kolom target di MySQL: nama_admin
            'username'   => $request->email,      // Kolom target di MySQL: username (diisi email)
            'password'   => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }

    /**
     * Display the registration view for Pembeli.
     */
    public function createPembeli(): View
    {
        return view('auth.register_pembeli');
    }

    /**
     * Handle an incoming registration request for Pembeli.
     */
    public function storePembeli(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:admin,username'],
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ]);

        // Simulasi / Implementasi penyimpanan akun pembeli menggunakan session
        session([
            'pembeli_logged_in' => true,
            'pembeli_name' => $request->name,
            'pembeli_email' => $request->email
        ]);

        return redirect()->route('dashboard.pembeli')->with('success', 'Akun pembeli berhasil didaftarkan!');
    }
}