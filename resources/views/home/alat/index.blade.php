@extends('layouts.master')
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Alat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Alat</li>
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
              <h3 class="card-title">Daftar Alat</h3>
              <div class="card-tools">
                <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm">
                  <i class="fas fa-plus"></i> Tambah Alat
                </a>
              </div>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 50px">No</th>
                    <th>Nama Alat</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Total Stok</th>
                    <th>Stok Tersedia</th>
                    <th style="width: 150px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($alats as $index => $alat)
                  <tr>
                    <td>{{ $index + 1 }}.</td>
                    <td>{{ $alat->nama_alat }}</td>
                    <td><span class="badge bg-info">{{ $alat->kategori->nama_kategori ?? '-' }}</span></td>
                    <td>{{ $alat->deskripsi_alat ?? '-' }}</td>
                    <td>{{ $alat->total_stok }}</td>
                    <td>{{ $alat->stok_yang_tersedia }}</td>
                    <td>
                      <a href="{{ route('alat.edit', $alat->id_alat) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                      </a>
                      <form action="{{ route('alat.destroy', $alat->id_alat) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus alat ini?')">
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
                    <td colspan="7" class="text-center">Belum ada data alat.</td>
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
