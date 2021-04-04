@extends('layouts.backend.app',[
    'title' => 'Tambah Users',
    'contentTitle' => 'Tambah Users',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.user.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input required class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" placeholder="Nama Lengkap">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input  class="form-control @error('username') is-invalid @enderror" type="text" name="username" id="username" placeholder="Username Harus Huruf kecil">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input  class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email" placeholder="">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input  class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select required="" class="form-control" name="level" id="level">
                    <option value="" disabled selected>-- PILIH LEVEL --</option>
                    <option value="admin">ADMIN</option>
                    <option value="operator">OPERATOR</option>
                    <option value="nasabah">NASABAH</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
@stop