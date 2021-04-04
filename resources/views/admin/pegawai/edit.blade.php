@extends('layouts.backend.app',[
    'title' => 'Edit Pegawai',
    'contentTitle' => 'Edit Pegawai',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.pegawai.index') }}" class="btn btn-danger btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.pegawai.update',$pegawai->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_pegawai">Nama Pegawai</label>
                <input value="{{ $pegawai->nm_pegawai }}" required class="form-control" type="" name="nm_pegawai" id="nm_pegawai" placeholder="">
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input value="{{ $pegawai->no_hp }}" required class="form-control" type="number" name="no_hp" id="no_hp" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $pegawai->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input value="{{ $pegawai->alamat }}" required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
            </div>
        </form>
    </div>
</div>
@stop