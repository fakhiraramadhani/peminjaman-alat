@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Pengembalian</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Pengembalian</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pengembalian</h3>
              <div class="card-tools">
                <a href="{{ route('pengembalian.create') }}" class="btn btn-primary btn-sm">
                  <i class="fas fa-plus"></i> Tambah Pengembalian
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 50px">No</th>
                    <th>ID Peminjaman</th>
                    <th>Peminjam</th>
                    <th>Alat</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Kondisi</th>
                    <th>Denda</th>
                    <th style="width: 150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($pengembalian as $index => $pg)
                  <tr>
                    <td>{{ $index + 1 }}.</td>
                    <td>{{ $pg->id_peminjaman }}</td>
                    <td>{{ $pg->peminjaman->user->nama_user ?? '-' }}</td>
                    <td><span class="badge bg-info">{{ $pg->peminjaman->alat->nama_alat ?? '-' }}</span></td>
                    <td>{{ $pg->tanggal_pinjam }}</td>
                    <td>{{ $pg->tanggal_kembali ?? '-' }}</td>
                    <td>{{ $pg->kondisi }}</td>
                    <td>Rp{{ number_format($pg->denda ?? 0, 0, ',', '.') }}</td>
                    <td>
                    <a href="{{ route('pengembalian.edit', $pg->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('pengembalian.destroy', $pg->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data pengembalian ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                    </td>
                    </form>
                    </td>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="9" class="text-center">Belum ada data pengembalian.</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
