@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah User Baru</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary shadow-sm">
                        <div class="card-header">
                            <h3 class="card-title">Form Tambah Pengguna</h3>
                        </div>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" name="nama_user" class="form-control" value="{{ old('nama_user') }}" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder="Masukkan username" required>
                                </div>

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="nama_role" class="form-control" required>
                                        <option value="">-- Pilih Role --</option>
                                        <option value="admin" {{ old('nama_role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="petugas" {{ old('nama_role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                        <option value="peminjam" {{ old('nama_role') == 'peminjam' ? 'selected' : '' }}>Peminjam</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>No. Telepon</label>
                                    <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp') }}" placeholder="Contoh: 081234567890">
                                </div>
                            </div>

                            <div class="card-footer d-flex justify-content-between">
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
