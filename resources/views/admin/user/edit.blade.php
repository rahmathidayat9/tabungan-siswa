@extends('layouts.backend.app',[
    'title' => 'Edit Users',
    'contentTitle' => 'Edit Users',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.user.index') }}" class="btn btn-danger btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.user.update',$user->id_users) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input value="{{ $user->name }}" required class="form-control" type="text" name="name" id="name" placeholder="contoh : Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input value="{{ $user->username }}" required class="form-control" type="text" name="username" id="username" placeholder="contoh : namapendek">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $user->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="hidden" name="old_password" value="{{ $user->password }}" class="form-control">
                <input class="form-control" type="password" name="password" id="password" placeholder="">
                <small>Kosongkan jika tidak ingin mengubah password</small>
            </div>
            <div class="form-group">
                <label for="level">Level</label>
                <select required class="form-control" name="level" id="level">
                    <option value="" disabled selected>-- PILIH LEVEL --</option>
                    <option value="admin">ADMIN</option>
                    <option value="operator">OPERATOR</option>
                    <option value="nasabah">NASABAH</option>
                </select>
            </div>
            <div class="form-group">
                <label for="is_active">Status</label>
                <select required class="form-control" name="is_active" id="is_active">
                    <option disabled selected>-- PILIH STATUS --</option>
                    <option value="1">AKTIF</option>
                    <option value="0">NONAKTIF</option>
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
            </div>
        </form>
    </div>
</div>
@stop