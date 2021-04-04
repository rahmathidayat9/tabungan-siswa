@extends('layouts.backend.app',[
    'title' => 'Edit Nasabah',
    'contentTitle' => 'Edit Nasabah',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.nasabah.index') }}" class="btn btn-danger btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.nasabah.update',$nasabah->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nm_nasabah">Nama Nasabah</label>
                <input value="{{ $nasabah->nm_nasabah }}" required class="form-control" type="" name="nm_nasabah" id="nm_nasabah" placeholder="">
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input value="{{ $nasabah->no_hp }}" required class="form-control" type="number" name="no_hp" id="no_hp" placeholder="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input value="{{ $nasabah->email }}" required class="form-control" type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input value="{{ $nasabah->alamat }}" required class="form-control" type="" name="alamat" id="alamat" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
            </div>
        </form>
    </div>
</div>
@stop