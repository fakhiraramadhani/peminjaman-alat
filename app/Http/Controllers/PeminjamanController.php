<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Peminjaman;
use App\Models\Alat;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['alat', 'peminjam'])->latest()->get();
        return view('home.peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $alat = Alat::all();
        $peminjam = User::all();
        return view('home.peminjaman.create', compact('alat', 'peminjam'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_alat'           => 'required|exists:alat,id_alat',
            'id_peminjam'       => 'required|exists:user,id_user',
            'jumlah_pinjam'     => 'required|integer|min:1',
            'tanggal_pinjam'    => 'required|date',
            'tanggal_kembali'   => 'required|date',
            'status'            => 'required|string|max:255',
            'tanggal_disetujui' => 'nullable|date',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $alat = Alat::all();
        $peminjam = User::all();
        return view('home.peminjaman.edit', compact('peminjaman', 'alat', 'peminjam'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_alat'           => 'required|exists:alat,id_alat',
            'id_peminjam'       => 'required|exists:user,id_user',
            'jumlah_pinjam'     => 'required|integer|min:1',
            'tanggal_pinjam'    => 'required|date',
            'tanggal_kembali'   => 'required|date',
            'status'            => 'required|string|max:255',
            'tanggal_disetujui' => 'nullable|date',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update($request->all());

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data Peminjaman berhasil dihapus.');
    }
}
