<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\WorkspaceController;

// =========================================================================
// RUTE UMUM / PUBLIC (Bisa diakses tanpa login)
// =========================================================================

Route::get('/', function () {
    return view('welcome');
});

// Rute Jelajahi Toko Pembeli
Route::get('/jelajahi-toko', function () {
    return view('dashboard_pembeli');
})->name('dashboard.pembeli');

// Rute Detail Per Toko
Route::get('/toko/rumah-anyaman', function () {
    return view('toko_detail');
})->name('toko.detail');

// Rute Keranjang Belanja Pembeli
Route::get('/keranjang', function () {
    return view('cart');
})->name('cart.index');

// Rute Riwayat Pesanan Pembeli
Route::get('/riwayat-pesanan', function () {
    return view('orders_history');
})->name('orders.history');

// Rute Menampilkan Halaman Checkout (GET)
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout.index');

// RUTE PROSES CHECKOUT POST (SUDAH DITAMBAHKAN AGAR TIDAK METHOD NOT ALLOWED)
Route::post('/checkout', function () {
    // Sementara kita langsung arahkan ke halaman riwayat pesanan (orders_history)
    return view('orders_history');
})->name('checkout.store');


// =========================================================================
// RUTE YANG MEMBUTUHKAN LOGIN (Mempunyai sistem proteksi auth)
// =========================================================================

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua rute internal yang butuh login dikumpulkan di dalam satu grup ini
Route::middleware('auth')->group(function () {
    
    // Rute Profil
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile.edit');
    
    // Rute Produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    
    // Rute Order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/detail', function () {
        return view('orders.show');
    })->name('orders.show');

    // Rute Keuangan
    Route::get('/keuangan', [FinanceController::class, 'index'])->name('finance.index');
    Route::get('/keuangan/cetak-pdf', [FinanceController::class, 'downloadPDF'])->name('finance.download-pdf');

    // Rute Workspace
    Route::get('/workspace', [WorkspaceController::class, 'index'])->name('workspace.index');

}); // <--- PENUTUP GRUP MIDDLEWARE AUTH YANG BENAR

require __DIR__.'/auth.php';