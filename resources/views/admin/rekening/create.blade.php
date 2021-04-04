@extends('layouts.backend.app',[
    'title' => 'Tambah Rekening',
    'contentTitle' => 'Tambah Rekening',
])

@section('content')
<!-- DataTales -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="{{ route('admin.rekening.index') }}" class="btn btn-danger btn-sm">Kembali</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.rekening.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="no_rekening">No Rekening</label>
                <input required class="form-control" type="" name="no_rekening" id="no_rekening" placeholder="">
            </div>
            <div class="form-group">
                <label for="pin">Pin</label>
                <input required class="form-control" type="" name="pin" id="pin" placeholder="">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
            </div>
        </form>
    </div>
</div>
@stop