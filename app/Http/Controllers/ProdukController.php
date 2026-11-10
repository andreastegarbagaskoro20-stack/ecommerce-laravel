<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // READ: Menampilkan katalog produk
    public function index()
    {
        $produks = Produk::all();

        return view('katalog', compact('produks'));
    }

    // CREATE: Menampilkan form tambah produk
    public function create()
    {
        return view('produk.create');
    }

    // CREATE: Menyimpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string|max:100',
            'berat' => 'nullable|string|max:100',
            'stok' => 'required|integer|min:0',
        ]);

        Produk::create($validated);

        return redirect()
            ->route('katalog')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    // READ: Menampilkan detail produk
    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    // UPDATE: Menampilkan form edit
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    // UPDATE: Menyimpan perubahan produk
    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'brand' => 'required|string|max:100',
            'harga' => 'required|numeric|min:0',
            'gambar' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'warna' => 'nullable|string|max:100',
            'berat' => 'nullable|string|max:100',
            'stok' => 'required|integer|min:0',
        ]);

        $produk->update($validated);

        return redirect()
            ->route('katalog')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    // DELETE: Menghapus produk
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()
            ->route('katalog')
            ->with('success', 'Produk berhasil dihapus!');
    }
}