@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Pengembalian</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pengembalian.index') }}">Pengembalian</a></li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Form Edit Pengembalian</h3>
            </div>

            <form action="{{ route('pengembalian.update', $pengembalian->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="card-body">
                <div class="form-group">
                  <label>Data Peminjaman</label>
                  <select name="id_peminjaman" class="form-control @error('id_peminjaman') is-invalid @enderror" required>
                    @foreach($peminjaman as $p)
                      <option value="{{ $p->id_peminjaman ?? $p->id }}" {{ old('id_peminjaman', $pengembalian->id_peminjaman) == ($p->id_peminjaman ?? $p->id) ? 'selected' : '' }}>
                        ID: {{ $p->id_peminjaman ?? $p->id }} - {{ $p->user->nama_user ?? 'Peminjam' }} ({{ $p->alat->nama_alat ?? 'Alat' }})
                      </option>
                    @endforeach
                  </select>
                  @error('id_peminjaman')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Tanggal Pinjam</label>
                  <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam', $pengembalian->tanggal_pinjam) }}" required>
                  @error('tanggal_pinjam')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Tanggal Kembali</label>
                  <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" value="{{ old('tanggal_kembali', $pengembalian->tanggal_kembali) }}" required>
                  @error('tanggal_kembali')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Kondisi Alat</label>
                  <input type="text" name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" value="{{ old('kondisi', $pengembalian->kondisi) }}" placeholder="Contoh: Baik, Rusak Ringan, Rusak Berat" required>
                  @error('kondisi')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Denda (Rp)</label>
                  <input type="number" name="denda" class="form-control @error('denda') is-invalid @enderror" value="{{ old('denda', $pengembalian->denda) }}" min="0" required>
                  @error('denda')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('pengembalian.index') }}" class="btn btn-secondary">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
