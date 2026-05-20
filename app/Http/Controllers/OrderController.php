<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    /**
     * Helper privat untuk mendeteksi nama tabel yang aktif di database kelompokmu.
     * Mengantisipasi apakah menggunakan nama jamak 'orders' atau bahasa Indonesia 'pesanan'.
     */
    private function getNamaTabel()
    {
        if (Schema::hasTable('orders')) {
            return 'orders';
        }
        return 'pesanan'; // Fallback jika tabel bernama pesanan
    }

    /**
     * Menampilkan daftar seluruh pesanan yang masuk.
     */
    public function index()
    {
        $tabel = $this->getNamaTabel();
        $daftarPesanan = [];
        
        if (Schema::hasTable($tabel)) {
            // Mengamankan jika kolom timestamps created_at tidak ada di skema migrasi tabel
            $orderByKolom = Schema::hasColumn($tabel, 'created_at') ? 'created_at' : (Schema::hasColumn($tabel, 'id_pesanan') ? 'id_pesanan' : 'id');
            
            $daftarPesanan = DB::table($tabel)
                ->orderBy($orderByKolom, 'desc')
                ->get();
        }

        return view('orders.index', compact('daftarPesanan'));
    }

    /**
     * Menampilkan halaman detail satu data pesanan secara spesifik.
     */
    public function show($id)
    {
        $tabel = $this->getNamaTabel();
        $pk = Schema::hasColumn($tabel, 'id_pesanan') ? 'id_pesanan' : 'id';
        
        $pesanan = DB::table($tabel)->where($pk, $id)->first();
        
        if (!$pesanan) {
            return redirect()->route('orders.index')->with('error', 'Pesanan tidak ditemukan!');
        }

        return view('orders.show', compact('pesanan'));
    }

    /**
     * Memproses pembaruan status pesanan (Pending, Diproses, Dikirim, Selesai).
     */
    public function updateStatus(Request $request, $id)
    {
        // 1. Validasi input agar string bersih dari spasi aneh
        $request->validate([
            'status' => 'required|string'
        ]);

        $tabel = $this->getNamaTabel();
        $pk = Schema::hasColumn($tabel, 'id_pesanan') ? 'id_pesanan' : 'id';
        $kolomStatus = Schema::hasColumn($tabel, 'status_pesanan') ? 'status_pesanan' : 'status';

        // 2. Normalisasi huruf (Mengubah 'diproses' / 'DIPROSES' menjadi tepat 'Diproses')
        $statusInput = trim(ucfirst(strtolower($request->status)));

        // 3. Eksekusi update langsung ke tabel database yang terdeteksi
        $updateBerhasil = DB::table($tabel)->where($pk, $id)->update([
            $kolomStatus => $statusInput,
            'updated_at' => now() // Otomatis perbarui rekam jejak waktu modifikasi
        ]);

        // Jika update gagal masuk karena kendala teknis query
        if (!$updateBerhasil) {
            return redirect()->back()->with('error', 'Database gagal menyimpan perubahan status pesanan.');
        }

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui menjadi ' . $statusInput);
    }
}