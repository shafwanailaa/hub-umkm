<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pembeli; // Tambahkan baris ini!
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    // --- PENJUAL ---
    public function createPenjual() {
        return view('auth.register_penjual'); // Pastikan file view ini ada
    }

    public function storePenjual(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'penjual', // Menandai user sebagai penjual
        ]);

        event(new Registered($user));
        auth()->login($user);

        return redirect()->route('profile.complete.penjual'); // Lanjut lengkapi data bisnis
    }

    // --- PEMBELI ---
    public function createPembeli() {
        return view('auth.register_pembeli');
    }

    public function storePembeli(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

       $user = Pembeli::create([
    'nama_customer' => $request->name, // Sesuai kolom di database
    'email'         => $request->email,
    'password'      => Hash::make($request->password),
]);

        auth()->login($user);
        return redirect()->route('dashboard.pembeli');
    }
}

