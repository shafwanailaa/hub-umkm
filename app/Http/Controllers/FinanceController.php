<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pdf;// Pastikan memuat facade PDF

class FinanceController extends Controller
{
    public function index()
    {
        // Data dashboard keuangan Anda yang sudah ada
        $pemasukan = 95000;
        $pengeluaran = 0;
        $saldoBersih = $pemasukan - $pengeluaran;
        $riwayat = [
            ['nama' => 'Pensilcase Rajut', 'tanggal' => '28/4/2026', 'deskripsi' => 'Pensilcase Rajut', 'status' => 'MASUK', 'jumlah' => 50000],
            ['nama' => 'Dompet Rajut', 'tanggal' => '28/4/2026', 'deskripsi' => 'Dompet Rajut', 'status' => 'MASUK', 'jumlah' => 45000],
        ];

        return view('finance.index', compact('pemasukan', 'pengeluaran', 'saldoBersih', 'riwayat'));
    }

    /**
     * Fungsi baru untuk generate dan download PDF Laporan Keuangan
     */
    public function downloadPDF()
    {
        // Menggunakan data yang sama persis dengan tampilan laporan
        $pemasukan = 95000;
        $pengeluaran = 0;
        $saldoBersih = $pemasukan - $pengeluaran;
        $riwayat = [
            ['no' => 1, 'tanggal' => '28/4/2026', 'deskripsi' => 'Pensilcase Rajut', 'status' => 'MASUK', 'jumlah' => 50000],
            ['no' => 2, 'tanggal' => '28/4/2026', 'deskripsi' => 'Dompet Rajut', 'status' => 'MASUK', 'jumlah' => 45000],
        ];

        // Load view khusus PDF dan set ukuran kertas A4 potrait
        $pdf = Pdf::loadView('finance.pdf_report', compact('pemasukan', 'pengeluaran', 'saldoBersih', 'riwayat'))
                  ->setPaper('a4', 'portrait');

        // Mengunduh langsung dengan nama file otomatis
        return $pdf->download('Laporan_Keuangan_HubUMKM.pdf');
    }
}