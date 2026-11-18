<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = Pengembalian::with('peminjaman')->latest()->get();
        return view('home.pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $peminjaman = Peminjaman::all();
        return view('home.pengembalian.create', compact('peminjaman'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // Ubah dari exists:peminjaman,id_peminjaman menjadi exists:peminjaman,id
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali'=> 'required|date',
            'kondisi' => 'required|string|max:255',
            'denda' => 'required|string|max:255',
        ]);

        Pengembalian::create($request->all());

        return redirect()->route('pengembalian.index')->with('success', 'Data Pengembalian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $peminjaman = Peminjaman::all();
        return view('home.pengembalian.edit', compact('pengembalian', 'peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // Ubah juga di bagian update ini menjadi exists:peminjaman,id
            'id_peminjaman' => 'required|exists:peminjaman,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali'=> 'required|date',
            'kondisi' => 'required|string|max:255',
            'denda' => 'required|string|max:255',
        ]);

        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->update($request->all());

        return redirect()->route('pengembalian.index')->with('success', 'Data Pengembalian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengembalian = Pengembalian::findOrFail($id);
        $pengembalian->delete();

        return redirect()->route('pengembalian.index')->with('success', 'Data pengembalian berhasil dihapus.');
    }
}
