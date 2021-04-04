@extends('layouts.backend.app',[
    'title' => 'Dashboard',
    'contentTitle' => 'Dashboard',
])

@push('css')

@endpush

@section('content')
<x-alert></x-alert>
<div class="row mb-3">
	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<div class="row ml-2">
					<i class="fas fa-fw fa-users fa-3x"> </i> <h4 class="ml-4 mt-3"> @count('users') USERS</h4>	
				</div>
				 
			</div>
			<div class="card-footer"><a href="{{ route('admin.user.index') }}">More Info</a></div>
		</div>	
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<div class="row ml-2">
					<i class="fas fa-fw fa-user-tie fa-3x"> </i> <h4 class="ml-4 mt-3"> @count('pegawai') PEGAWAI</h4>	
				</div>
				 
			</div>
			<div class="card-footer"><a href="{{ route('admin.pegawai.index') }}">More Info</a></div>
		</div>	
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-body">
				<div class="row ml-2">
					<i class="fas fa-fw fa-user fa-3x"> </i> <h4 class="ml-4 mt-3"> @count('nasabah') NASABAH</h4>	
				</div> 
			</div>
			<div class="card-footer"><a href="{{ route('admin.nasabah.index') }}">More Info</a></div>
		</div>	
	</div>
</div>

<div class="row">
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header bg-dark text-white">Transaksi</div>
			<div class="row ml-2">
				<div class="card-body">
					<ul>
						<li>Total semua transaksi : <b>Rp @toRupiah($total_transaksi)</b></li>
					</ul>

					@if($total_transaksi > 0)
					<div class="form-group">
						<form method="POST" action="{{ route('admin.truncate.transaksi') }}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit" onclick="return confirm('Yakin Reset Transaksi ?')">RESET SEMUA TRANSAKSI</button>
						</form>
					</div>
					@endif
				</div>	
			</div>
		</div>
	</div>	

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header bg-primary text-white">Aksi Cepat</div>
			<div class="card-body">
				<div class="list-group">
				  <a href="{{ route('transfer.index') }}" class="list-group-item list-group-item-action">Transfer</a>
				  
				  <a href="{{ route('tarik.index') }}" class="list-group-item list-group-item-action">Tarik</a>
				
				  <a href="{{ route('setor.index') }}" class="list-group-item list-group-item-action">Setor</a>
				</div>
			</div>	
		</div>
	</div>	
</div>
@stop

@push('js')

@endpush