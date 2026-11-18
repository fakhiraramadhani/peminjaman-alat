@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Pengembalian</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pengembalian.index') }}">Pengembalian</a></li>
            <li class="breadcrumb-item active">Tambah</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Pengembalian</h3>
            </div>

            <form action="{{ route('pengembalian.store') }}" method="POST">
              @csrf
              <div class="card-body">

                <div class="form-group">
                  <label>Data Peminjaman</label>
                  <select name="id_peminjaman" class="form-control @error('id_peminjaman') is-invalid @enderror" required>
                    <option value="">-- Pilih Data Peminjaman --</option>
                    @foreach($peminjaman as $p)
                      <option value="{{ $p->id_peminjaman ?? $p->id }}" {{ old('id_peminjaman') == ($p->id_peminjaman ?? $p->id) ? 'selected' : '' }}>
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
                  <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam') }}" required>
                  @error('tanggal_pinjam')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Tanggal Kembali</label>
                  <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" value="{{ old('tanggal_kembali', date('Y-m-d')) }}" required>
                  @error('tanggal_kembali')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Kondisi Alat</label>
                  <select name="kondisi" class="form-control @error('kondisi') is-invalid @enderror" required>
                    <option value="">-- Pilih Kondisi Alat --</option>
                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                    <option value="Hilang" {{ old('kondisi') == 'Hilang' ? 'selected' : '' }}>Hilang</option>
                  </select>
                  @error('kondisi')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Denda (Rp)</label>
                  <input type="number" name="denda" class="form-control @error('denda') is-invalid @enderror" value="{{ old('denda', 0) }}" min="0" required>
                  @error('denda')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
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
