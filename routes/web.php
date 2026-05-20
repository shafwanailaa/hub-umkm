<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\DashboardController; 

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


// =========================================================================
// INTEGRASI FITUR BARU: ROUTE LOGIN WITH GOOGLE (Public)
// =========================================================================
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


// =========================================================================
// GATES / GERBANG KHUSUS PEMBELI (Login & Register Terpisah)
// =========================================================================
Route::middleware('guest')->group(function () {
    // Tampilan & Proses Login Pembeli
    Route::get('/pembeli/login', [AuthenticatedSessionController::class, 'createPembeli'])->name('pembeli.login');
    Route::post('/pembeli/login', [AuthenticatedSessionController::class, 'storePembeli'])->name('pembeli.login.store');

    // Tampilan & Proses Register Pembeli
    Route::get('/pembeli/register', [RegisteredUserController::class, 'createPembeli'])->name('pembeli.register');
    Route::post('/pembeli/register', [RegisteredUserController::class, 'storePembeli'])->name('pembeli.register.store');
});


// =========================================================================
// RUTE YANG MEMBUTUHKAN LOGIN PEMBELI (Mempunyai sistem proteksi auth pembeli)
// =========================================================================
Route::middleware(['auth.pembeli'])->group(function () {

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

    // RUTE PROSES CHECKOUT POST
    Route::post('/checkout', function () {
        return view('orders_history');
    })->name('checkout.store');

});


// =========================================================================
// RUTE YANG MEMBUTUHKAN LOGIN PENJUAL / UMKM (Diproteksi 'auth' & 'role:penjual')
// =========================================================================

// Dashboard Utama Penjual
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'role:penjual'])
    ->name('dashboard');

// Semua rute internal manajemen UMKM diproteksi agar tidak bisa diterobos oleh 'pembeli'
Route::middleware(['auth', 'role:penjual'])->group(function () {
    
    // Rute Profil
    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile.edit');
    
    // =========================================================================
    // MODUL UTAMA MANAJEMEN PRODUK (GET, POST, PUT, DELETE) - FULL SINKRON
    // =========================================================================
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    
    // Rute Order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/detail', function () {
        return view('orders.show');
    })->name('orders.show');

    // Rute Keuangan
    Route::get('/keuangan', [FinanceController::class, 'index'])->name('finance.index');
    Route::get('/finance/cetak-pdf', [FinanceController::class, 'downloadPDF'])->name('finance.download-pdf');

    // Rute Workspace
    Route::get('/workspace', [WorkspaceController::class, 'index'])->name('workspace.index');
// Rute Modul Order Penjual
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    
    // Mengubah detail pesanan agar menerima parameter ID dinamis dari database
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    
    // Rute untuk menembak aksi update status pesanan
    Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
});

require __DIR__.'/auth.php';