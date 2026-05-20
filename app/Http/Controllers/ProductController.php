<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $tabel = 'produk';

    public function index()
    {
        $daftarProduk = [];
        if (Schema::hasTable($this->tabel)) {
            $daftarProduk = DB::table($this->tabel)->get();
        }
        return view('products.index', compact('daftarProduk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $pathGambar = null;
        if ($request->hasFile('image')) {
            $pathGambar = $request->file('image')->store('products', 'public');
        }

        // DISELARASKAN DENGAN DATABASE ASLI KAMU
        $kolomNama  = 'nama_produk';
        $kolomHarga = 'harga';
        $kolomStok  = 'stok';
        $kolomFoto  = 'foto_produk'; // <--- KUNCI UTAMA SINKRONISASI

        $dataInsert = [
            $kolomNama  => $request->name,
            $kolomHarga => $request->price,
            $kolomStok  => $request->stock,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        if (Schema::hasColumn($this->tabel, $kolomFoto)) {
            $dataInsert[$kolomFoto] = $pathGambar;
        }

        // Pengaman Relasi id_kategori
        if (Schema::hasColumn($this->tabel, 'id_kategori')) {
            $kategori = DB::table('kategori')->first();
            if ($kategori) {
                $dataInsert['id_kategori'] = $kategori->id_kategori;
            } else {
                $idCat = DB::table('kategori')->insertGetId([
                    'nama_kategori' => 'Umum', 'created_at' => now(), 'updated_at' => now()
                ]);
                $dataInsert['id_kategori'] = $idCat;
            }
        }

        DB::table($this->tabel)->insert($dataInsert);
        return redirect()->route('products.index')->with('success', 'Produk baru berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $produk = DB::table($this->tabel)->where('id_produk', $id)->first();

        if (!$produk) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan!');
        }

        $kolomNama  = 'nama_produk';
        $kolomHarga = 'harga';
        $kolomStok  = 'stok';
        $kolomFoto  = 'foto_produk';

        $pathGambar = $produk->$kolomFoto ?? null;
        if ($request->hasFile('image')) {
            if ($pathGambar) {
                Storage::disk('public')->delete($pathGambar);
            }
            $pathGambar = $request->file('image')->store('products', 'public');
        }

        $dataUpdate = [
            $kolomNama  => $request->name,
            $kolomHarga => $request->price,
            $kolomStok  => $request->stock,
            'updated_at' => now(),
        ];

        if (Schema::hasColumn($this->tabel, $kolomFoto)) {
            $dataUpdate[$kolomFoto] = $pathGambar;
        }

        DB::table($this->tabel)->where('id_produk', $id)->update($dataUpdate);
        return redirect()->route('products.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $produk = DB::table($this->tabel)->where('id_produk', $id)->first();

        if ($produk) {
            if (!empty($produk->foto_produk)) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            DB::table($this->tabel)->where('id_produk', $id)->delete();
            return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus!');
        }

        return redirect()->route('products.index')->with('error', 'Produk gagal dihapus!');
    }
}