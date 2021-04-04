@extends('layouts.backend.app',[
    'title' => 'Generate Laporan',
    'contentTitle' => 'Generate Laporan',
])
@section('content')
<x-alert></x-alert>
<div class="row">
	<div class="col-lg-6">
		<div class="card mb-3">
			<div class="card-header">Laporan Transaksi</div>
			<div class="card-body">
				<form method="post" action="{{ route('admin.laporan.transaksi') }}">
					@csrf
					<div class="form-group">
						<label for="tgl_mulai">Dari Tanggal</label>
						<input type="date" name="tgl_mulai" class="form-control">
					</div>

					<div class="form-group">
						<label for="tgl_selesai">Sampai Tanggal</label>
						<input type="date" name="tgl_selesai" class="form-control">
					</div>	
					<div class="form-group">
						<button type="submit" class="btn btn-danger btn-sm">GENERATE PDF</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop