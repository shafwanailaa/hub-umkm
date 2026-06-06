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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// --- HALAMAN UTAMA ---
Route::get('/', function () { return view('welcome'); });
Route::get('/jelajahi-toko', function () { return view('dashboard_pembeli'); })->name('dashboard.pembeli');
Route::get('/toko/rumah-anyaman', function () { return view('toko_detail'); })->name('toko.detail');

// --- GOOGLE AUTH ---
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// --- AUTH PEMBELI ---
Route::get('/pembeli/login', [AuthenticatedSessionController::class, 'createPembeli'])->name('pembeli.login');
Route::post('/pembeli/login', [AuthenticatedSessionController::class, 'storePembeli'])->name('pembeli.login.store');
Route::get('/pembeli/register', [RegisteredUserController::class, 'createPembeli'])->name('pembeli.register');
Route::post('/pembeli/register', [RegisteredUserController::class, 'storePembeli'])->name('pembeli.register.store');

// --- REGISTER UMUM ---
Route::get('/register', [RegisteredUserController::class, 'createPembeli'])->name('register');

// --- FITUR KERANJANG ---
Route::get('/keranjang', function () { return view('cart'); })->name('cart.index');
Route::get('/riwayat-pesanan', function () { return view('orders_history'); })->name('orders.history');
Route::get('/checkout', function () { return view('checkout'); })->name('checkout.index');

// --- DASHBOARD ADMIN (TANPA MIDDLEWARE YANG BIKIN EROR) ---
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', function () { return view('profile.index'); })->name('profile.edit');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/keuangan', [FinanceController::class, 'index'])->name('finance.index');
Route::get('/finance/cetak-pdf', [FinanceController::class, 'downloadPDF'])->name('finance.download-pdf');
Route::get('/workspace', [WorkspaceController::class, 'index'])->name('workspace.index');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');

// --- DATA COMPLETION ---
Route::get('/lengkap-data-penjual', function () { return view('auth.complete-penjual'); })->name('profile.complete.penjual');
Route::get('/lengkap-data-pembeli', function () { return view('auth.complete-pembeli'); })->name('profile.complete.pembeli');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');