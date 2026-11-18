@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
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
              <h3 class="card-title">Form Edit Peminjaman</h3>
            </div>

            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="card-body">
                <div class="form-group">
                  <label>Peminjam</label>
                  <select name="id_peminjam" class="form-control @error('id_peminjam') is-invalid @enderror" required>
                    @foreach($peminjam as $p)
                      <option value="{{ $p->id_user }}" {{ old('id_peminjam', $peminjaman->id_peminjam) == $p->id_user ? 'selected' : '' }}>
                        {{ $p->nama_user }}
                      </option>
                    @endforeach
                  </select>
                  @error('id_peminjam')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

              <div class="card-body">
                <div class="form-group">
                  <label>Alat</label>
                  <select name="id_alat" class="form-control @error('id_alat') is-invalid @enderror" required>
                    @foreach($alat as $a)
                      <option value="{{ $a->id_alat }}" {{ old('id_alat', $peminjaman->id_alat) == $a->id_alat ? 'selected' : '' }}>
                        {{ $a->nama_alat }}
                      </option>
                    @endforeach
                  </select>
                  @error('id_alat')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Jumlah Pinjam</label>
                  <input type="number" name="jumlah_pinjam" class="form-control @error('jumlah_pinjam') is-invalid @enderror" value="{{ old('jumlah_pinjam', $peminjaman->jumlah_pinjam) }}" min="0" required>
                  @error('jumlah_pinjam')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Tanggal Pinjam</label>
                  <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}" required>
                  @error('tanggal_pinjam')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Tanggal Kembali</label>
                  <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}" required>
                  @error('tanggal_kembali')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <input type="text" name="status" class="form-control @error('status') is-invalid @enderror" value="{{ old('status', $peminjaman->status) }}" required>
                  @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Tanggal Disetujui</label>
                  <input type="date" name="tanggal_disetujui" class="form-control @error('tanggal_disetujui') is-invalid @enderror" value="{{ old('tanggal_disetujui', $peminjaman->tanggal_disetujui) }}" required>
                  @error('tanggal_disetujui')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-warning">Simpan</button>
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
