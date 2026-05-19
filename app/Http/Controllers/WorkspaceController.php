<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkspaceController extends Controller
{
    /**
     * Menampilkan halaman utama Workspace.
     */
    public function index()
    {
        // Nantinya di sini kita akan mengambil data dari Database
        // Contoh: $notes = Note::all();
        
        return view('workspace.index');
    }

    /**
     * Fungsi untuk menyimpan catatan baru (opsional untuk nanti).
     */
    public function storeNote(Request $request)
    {
        // Logika simpan catatan ke database akan di sini
    }

    /**
     * Fungsi untuk menyimpan task baru (opsional untuk nanti).
     */
    public function storeTask(Request $request)
    {
        // Logika simpan task ke database akan di sini
    }
}