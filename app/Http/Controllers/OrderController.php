<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrderController extends Controller
{
    private function getNamaTabel()
    {
        return Schema::hasTable('orders') ? 'orders' : 'pesanan';
    }

    public function index()
    {
        $tabel = $this->getNamaTabel();
        $daftarPesanan = Schema::hasTable($tabel) 
            ? DB::table($tabel)->orderBy('created_at', 'desc')->get() 
            : [];

        return view('orders.index', compact('daftarPesanan'));
    }

    public function show($id)
    {
        $tabel = $this->getNamaTabel();
        $pk = Schema::hasColumn($tabel, 'id_pesanan') ? 'id_pesanan' : 'id';
        
        $pesanan = DB::table($tabel)->where($pk, $id)->first();
        
        return $pesanan ? view('orders.show', compact('pesanan')) 
                        : redirect()->route('orders.index')->with('error', 'Pesanan tidak ditemukan!');
    }

    /**
     * Memproses pembaruan status pesanan.
     */
    public function updateStatus(Request $request, $id)
    {
        // 1. Validasi Input
        $request->validate([
            'status' => 'required|in:Pending,Diproses,Selesai,Dibatalkan',
        ]);

        $tabel = $this->getNamaTabel();
        $pk = Schema::hasColumn($tabel, 'id_pesanan') ? 'id_pesanan' : 'id';
        $kolomStatus = Schema::hasColumn($tabel, 'status_pesanan') ? 'status_pesanan' : 'status';

        // 2. Eksekusi Update
        $updateBerhasil = DB::table($tabel)
            ->where($pk, $id)
            ->update([
                $kolomStatus => $request->status,
                'updated_at' => now(),
            ]);

        // 3. Respon
        return $updateBerhasil 
            ? redirect()->back()->with('success', 'Status pesanan berhasil diperbarui menjadi ' . $request->status)
            : redirect()->back()->with('error', 'Gagal memperbarui database.');
    }
}