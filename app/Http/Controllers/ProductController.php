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
            $daftarProduk = DB::table($this->tabel)->orderBy('created_at', 'desc')->get();
        }
        return view('products.index', compact('daftarProduk'));
    }

    public function store(Request $request)
    {
        // Pastikan name atribut di form sesuai dengan 'name', 'price', 'stock', 'image'
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

        $dataInsert = [
            'nama_produk' => $request->name,
            'harga'       => $request->price,
            'stok'        => $request->stock,
            'foto_produk' => $pathGambar,
            'created_at'  => now(),
            'updated_at'  => now(),
        ];

        // Pengaman Relasi Kategori agar tidak eror
        if (Schema::hasColumn($this->tabel, 'id_kategori')) {
            $kategori = DB::table('kategori')->first();
            $dataInsert['id_kategori'] = $kategori ? $kategori->id_kategori : null;
        }

        DB::table($this->tabel)->insert($dataInsert);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
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

        $pathGambar = $produk->foto_produk;
        if ($request->hasFile('image')) {
            if ($pathGambar) {
                Storage::disk('public')->delete($pathGambar);
            }
            $pathGambar = $request->file('image')->store('products', 'public');
        }

        DB::table($this->tabel)->where('id_produk', $id)->update([
            'nama_produk' => $request->name,
            'harga'       => $request->price,
            'stok'        => $request->stock,
            'foto_produk' => $pathGambar,
            'updated_at'  => now(),
        ]);

        return redirect()->route('products.index')->with('success', 'Produk diperbarui!');
    }

    public function destroy($id)
    {
        $produk = DB::table($this->tabel)->where('id_produk', $id)->first();

        if ($produk) {
            if ($produk->foto_produk) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            DB::table($this->tabel)->where('id_produk', $id)->delete();
            return redirect()->route('products.index')->with('success', 'Produk dihapus!');
        }

        return redirect()->route('products.index')->with('error', 'Data tidak ditemukan!');
    }
}