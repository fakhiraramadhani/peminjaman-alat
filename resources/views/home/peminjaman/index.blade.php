@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Peminjaman</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Peminjaman</li>
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
              <h3 class="card-title">Daftar Peminjaman</h3>
              <div class="card-tools">
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm">
                  <i class="fas fa-plus"></i> Tambah Peminjaman
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 50px">No</th>
                    <th>Peminjam</th>
                    <th>Alat</th>
                    <th>Jumlah Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Tanggal Disetujui</th>
                    <th style="width: 150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  
                  @forelse($peminjaman as $index => $p)
                  <tr>
                    <td>{{ $index + 1 }}.</td>
                    <td>{{ $p->user->nama_user ?? $p->peminjam->nama_user ?? '-' }}</td>
                    <td>{{ $p->alat->nama_alat ?? $p->alat->nama_alat ?? '-' }}</td>
                    <td>{{ $p->jumlah_pinjam }}</td>
                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->tanggal_kembali ?? '-' }}</td>
                    <td>{{ $p->status }}</td>
                    <td>{{ $p->tanggal_disetujui ?? '-' }}</td>

                    <td>

                    <a href="{{ route('peminjaman.edit', $p->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data peminjaman ini?')">
                         @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Hapus
                    </button>
                    </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="9" class="text-center">Belum ada data peminjaman.</td>
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
