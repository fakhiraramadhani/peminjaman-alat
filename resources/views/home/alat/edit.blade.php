@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Alat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('alat.index') }}">Alat</a></li>
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
              <h3 class="card-title">Form Edit Alat</h3>
            </div>
            <form action="{{ route('alat.update', $alat->id_alat) }}" method="POST">
              @csrf
              @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Alat</label>
                  <input type="text" name="nama_alat" class="form-control @error('nama_alat') is-invalid @enderror" value="{{ old('nama_alat', $alat->nama_alat) }}" required>
                  @error('nama_alat')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Kategori</label>
                  <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror" required>
                    @foreach($kategoris as $kategori)
                      <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori', $alat->id_kategori) == $kategori->id_kategori ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                      </option>
                    @endforeach
                  </select>
                  @error('id_kategori')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Deskripsi Alat</label>
                  <textarea name="deskripsi_alat" class="form-control @error('deskripsi_alat') is-invalid @enderror" rows="3">{{ old('deskripsi_alat', $alat->deskripsi_alat) }}</textarea>
                  @error('deskripsi_alat')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Total Stok</label>
                      <input type="number" name="total_stok" class="form-control @error('total_stok') is-invalid @enderror" value="{{ old('total_stok', $alat->total_stok) }}" min="0" required>
                      @error('total_stok')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Stok yang Tersedia</label>
                      <input type="number" name="stok_yang_tersedia" class="form-control @error('stok_yang_tersedia') is-invalid @enderror" value="{{ old('stok_yang_tersedia', $alat->stok_yang_tersedia) }}" min="0" required>
                      @error('stok_yang_tersedia')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('alat.index') }}" class="btn btn-secondary">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
