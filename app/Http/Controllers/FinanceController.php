<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan menggunakan facade yang benar

class FinanceController extends Controller
{
    public function index()
    {
        $data = $this->getData();
        return view('finance.index', $data);
    }

    public function downloadPDF()
    {
        // 1. Ambil data
        $data = $this->getData();

        // 2. Persiapkan Logo (Base64)
        $path = public_path('images/logo.png');
        $logoBase64 = '';

        if (file_exists($path)) {
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $imageData = file_get_contents($path);
            $logoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($imageData);
        }

        // 3. Masukkan logo ke dalam data
        $data['logoBase64'] = $logoBase64;

        // 4. Load view dengan data lengkap
        $pdf = Pdf::loadView('finance.pdf_report', $data)
                  ->setPaper('a4', 'portrait');

        return $pdf->download('Laporan_Keuangan_HubUMKM.pdf');
    }

    // Fungsi pembantu agar kode tidak duplikat
    private function getData()
    {
        return [
            'pemasukan' => 95000,
            'pengeluaran' => 0,
            'saldoBersih' => 95000,
            'riwayat' => [
                ['no' => 1, 'tanggal' => '28/4/2026', 'deskripsi' => 'Pensilcase Rajut', 'status' => 'MASUK', 'jumlah' => 50000],
                ['no' => 2, 'tanggal' => '28/4/2026', 'deskripsi' => 'Dompet Rajut', 'status' => 'MASUK', 'jumlah' => 45000],
            ]
        ];
    }
}