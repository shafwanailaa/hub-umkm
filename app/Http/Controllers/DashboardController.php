<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. DETEKSI NAMA TABEL PRODUK YANG EKSIS
        $tabelProduk = 'product';
        if (!Schema::hasTable($tabelProduk) && Schema::hasTable('products')) {
            $tabelProduk = 'products';
        }

        // 2. DETEKSI NAMA TABEL PESANAN YANG EKSIS
        $tabelOrders = null;
        $namaTabelAlternatif = ['orders', 'order', 'pesanan', 'transaksi'];
        foreach ($namaTabelAlternatif as $tabel) {
            if (Schema::hasTable($tabel)) {
                $tabelOrders = $tabel;
                break;
            }
        }

        // 3. DETEKSI NAMA KOLOM NOMINAL UANG PADA TABEL ORDERS
        $kolomHarga = null; // Di-set null secara default
        if ($tabelOrders) {
            $namaKolomAlternatif = ['total_harga', 'total', 'harga', 'subtotal', 'nominal', 'grand_total', 'total_bayar'];
            foreach ($namaKolomAlternatif as $kolom) {
                if (Schema::hasColumn($tabelOrders, $kolom)) {
                    $kolomHarga = $kolom;
                    break;
                }
            }
        }

        // =========================================================================
        // PROSES HITUNG DATA AGREGAT SECARA AMAN (ANTI EROR MUTLAK)
        // =========================================================================

        // Hitung Total Penjualan Hari Ini
        $totalPenjualanHariIni = 0;
        // Hanya jalankan SUM jika tabel dan kolom harga benar-benar ditemukan
        if ($tabelOrders && $kolomHarga) {
            $totalPenjualanHariIni = DB::table($tabelOrders)
                ->whereDate('created_at', Carbon::today())
                ->sum($kolomHarga);
        }

        // Hitung Jumlah Order Masuk Hari Ini
        $orderHariIni = 0;
        if ($tabelOrders) {
            $orderHariIni = DB::table($tabelOrders)
                ->whereDate('created_at', Carbon::today())
                ->count();
        }

        // Hitung Total Seluruh Produk
        $totalProduk = 0;
        if (Schema::hasTable($tabelProduk)) {
            $totalProduk = DB::table($tabelProduk)->count();
        }

        // Ambil 5 Baris Pesanan Paling Baru
        $pesananTerbaru = [];
        if ($tabelOrders) {
            // Deteksi nama kolom pembeli
            $kolomPembeli = 'nama_pembeli';
            if (!Schema::hasColumn($tabelOrders, $kolomPembeli)) {
                $pembeliAlternatif = ['nama', 'username', 'customer', 'pembeli'];
                foreach ($pembeliAlternatif as $pbl) {
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
                        // Jika kolom target tidak ada, isi dengan data aman agar web tidak crash
                        'nama_pembeli' => $kolomPembeli ? ($item->$kolomPembeli ?? 'Pelanggan') : 'Pelanggan',
                        'total_harga'  => $kolomHarga ? ($item->$kolomHarga ?? 0) : 0,
                        'status'       => $item->status ?? 'Pending'
                    ];
                });
        }

        // Oper semua data nyata yang aman ini ke dalam view blade dashboard
        return view('dashboard', compact(
            'totalPenjualanHariIni',
            'orderHariIni',
            'totalProduk',
            'pesananTerbaru'
        ));
    }
}