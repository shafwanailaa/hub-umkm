<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth; // Tambahkan ini
use App\Models\User;                // Tambahkan ini
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // === JALAN PINTAS: AUTO LOGIN ADMIN ===
        if (!Auth::check()) {
            $admin = User::where('role', 'penjual')->first();
            if ($admin) {
                Auth::login($admin);
            }
        }
        // ======================================

        // 1. DETEKSI NAMA TABEL PRODUK
        $tabelProduk = 'product';
        if (!Schema::hasTable($tabelProduk) && Schema::hasTable('products')) {
            $tabelProduk = 'products';
        }

        // 2. DETEKSI NAMA TABEL PESANAN
        $tabelOrders = null;
        $namaTabelAlternatif = ['orders', 'order', 'pesanan', 'transaksi'];
        foreach ($namaTabelAlternatif as $tabel) {
            if (Schema::hasTable($tabel)) {
                $tabelOrders = $tabel;
                break;
            }
        }

        // 3. DETEKSI KOLOM HARGA
        $kolomHarga = null;
        if ($tabelOrders) {
            $namaKolomAlternatif = ['total_harga', 'total', 'harga', 'subtotal', 'nominal', 'grand_total', 'total_bayar'];
            foreach ($namaKolomAlternatif as $kolom) {
                if (Schema::hasColumn($tabelOrders, $kolom)) {
                    $kolomHarga = $kolom;
                    break;
                }
            }
        }

        // HITUNG DATA AGREGAT
        $totalPenjualanHariIni = ($tabelOrders && $kolomHarga) ? DB::table($tabelOrders)->whereDate('created_at', Carbon::today())->sum($kolomHarga) : 0;
        $orderHariIni = $tabelOrders ? DB::table($tabelOrders)->whereDate('created_at', Carbon::today())->count() : 0;
        $totalProduk = Schema::hasTable($tabelProduk) ? DB::table($tabelProduk)->count() : 0;

        // AMBIL PESANAN TERBARU
        $pesananTerbaru = [];
        if ($tabelOrders) {
            $kolomPembeli = 'nama_pembeli';
            if (!Schema::hasColumn($tabelOrders, $kolomPembeli)) {
                foreach (['nama', 'username', 'customer', 'pembeli'] as $pbl) {
                    if (Schema::hasColumn($tabelOrders, $pbl)) {
                        $kolomPembeli = $pbl;
                        break;
                    }
                }
            }

            $pesananTerbaru = DB::table($tabelOrders)
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get()
                ->map(function($item) use ($kolomHarga, $kolomPembeli) {
                    return (object)[
                        'nama_pembeli' => $kolomPembeli ? ($item->$kolomPembeli ?? 'Pelanggan') : 'Pelanggan',
                        'total_harga'  => $kolomHarga ? ($item->$kolomHarga ?? 0) : 0,
                        'status'       => $item->status ?? 'Pending'
                    ];
                });
        }

        return view('dashboard', compact('totalPenjualanHariIni', 'orderHariIni', 'totalProduk', 'pesananTerbaru'));
    }
}