<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkspaceController extends Controller
{
    /**
     * Menampilkan halaman utama Workspace.
     */
    public function index()
    {
        return view('workspace.index');
    }

    /**
     * Fungsi untuk menyimpan catatan baru.
     */
    public function storeNote(Request $request)
    {
        // Validasi data
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        // Simpan ke database
        DB::table('workspace')->insert([
            'nama_tugas' => 'Catatan Baru', 
            'deskripsi'  => $request->content, 
            'status'     => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('workspace.index')->with('success', 'Catatan berhasil disimpan!');
    }

    /**
     * Fungsi untuk menyimpan task baru.
     */
    public function storeTask(Request $request)
    {
        // Logika simpan task ke database akan di sini
    }
}