@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
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
          <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Form Tambah Peminjaman</h3>
            </div>

            
            <form action="{{ route('peminjaman.store') }}" method="POST">
              @csrf
              <div class="card-body">

              <div class="form-group">
                  <label>Peminjam</label>
                  <select name="id_peminjam" class="form-control @error('id_peminjam') is-invalid @enderror" required>
                    <option value="">-- Pilih Peminjam --</option>
                    {{-- Gunakan variabel $p sesuai definisi @foreach($peminjam as $p) --}}
                    @foreach($peminjam as $p)
                      <option value="{{ $p->id_user }}" {{ old('id_peminjam') == $p->id_user ? 'selected' : '' }}>
                        {{ $p->nama_user }}
                      </option>
                    @endforeach
                  </select>
                  @error('id_peminjam')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Alat</label>
                  <select name="id_alat" class="form-control @error('id_alat') is-invalid @enderror" required>
                    <option value="">-- Pilih Alat --</option>
                    {{-- Gunakan variabel $a sesuai definisi @foreach($alat as $a) --}}
                    @foreach($alat as $a)
                      <option value="{{ $a->id_alat }}" {{ old('id_alat') == $a->id_alat ? 'selected' : '' }}>
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
                  <input type="number" name="jumlah_pinjam" class="form-control @error('jumlah_pinjam') is-invalid @enderror" value="{{ old('jumlah_pinjam') }}" min="1" required>
                  @error('jumlah_pinjam')
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
                  <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" value="{{ old('tanggal_kembali') }}">
                  @error('tanggal_kembali')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Status</label>
                  <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                    <option value="Menunggu" {{ old('status') == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                    <option value="Disetujui" {{ old('status') == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="Dikembalikan" {{ old('status') == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                  </select>
                  @error('status')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-group">
                  <label>Tanggal Disetujui</label>
                  <input type="date" name="tanggal_disetujui" class="form-control @error('tanggal_disetujui') is-invalid @enderror" value="{{ old('tanggal_disetujui') }}">
                  @error('tanggal_disetujui')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
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
