<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    // Menampilkan semua data alat
    public function index()
    {
        $alats = Alat::with('kategori')->latest()->get();
        return view('home.alat.index', compact('alats'));
    }

    // Menampilkan form tambah alat
    public function create()
    {
        $kategoris = Kategori::all();
        return view('home.alat.create', compact('kategoris'));
    }

    // Menyimpan data alat baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'deskripsi_alat' => 'nullable|string',
            'total_stok' => 'required|integer|min:0',
            'stok_yang_tersedia' => 'required|integer|min:0|lte:total_stok',
        ]);

        Alat::create($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil ditambahkan.');
    }

    // Menampilkan form edit alat
    public function edit($id)
    {
        $alat = Alat::findOrFail($id);
        $kategoris = Kategori::all();
        return view('home.alat.edit', compact('alat', 'kategoris'));
    }

    // Memperbarui data alat
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alat' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'deskripsi_alat' => 'nullable|string',
            'total_stok' => 'required|integer|min:0',
            'stok_yang_tersedia' => 'required|integer|min:0|lte:total_stok',
        ]);

        $alat = Alat::findOrFail($id);
        $alat->update($request->all());

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil diperbarui.');
    }

    // Menghapus data alat
    public function destroy($id)
    {
        $alat = Alat::findOrFail($id);
        $alat->delete();

        return redirect()->route('alat.index')->with('success', 'Data alat berhasil dihapus.');
    }
}
