@extends('layouts.backend.app',[
	'title' => 'Transaksi',
	'contentTitle' => 'Transaksi',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<x-alert></x-alert>

<div class="row">
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">Tambah Transaksi</div>
			<div class="card-body">
			<form method="POST" action="{{ route('transaksi.store') }}">
				@csrf
				<div class="row">
					<div class="col-lg">
						<div class="form-group">
							<label for="nasabah">Nama Nasabah</label>
							<input readonly="" type="" class="form-control" name="nasabah" value="{{ $nasabah->nm_nasabah }}">
						</div>
						<div class="form-group">
							<label for="no_rekening">No Rekening</label>
							<input readonly="" type="" class="form-control" name="no_rekening" value="{{ $rekening->no_rekening }}">
						</div>

						<div class="form-group">
							<label for="nominal">Nominal</label>
							<input required="" type="number" placeholder="Nominal" name="nominal" id="nominal" class="form-control">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary">KONFIRMASI</button>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="form-group">
							<label for="jns_transaksi">Jenis Transaksi</label>
							<select required="" name="jns_transaksi" id="jns_transaksi" class="form-control">
								<option disabled="">- PILIH JENIS TRANSAKSI -</option>
								<option value="setor">SETOR</option>
								<option value="tarik">TARIK</option>
							</select>
						</div>
						<div class="form-group">
							<label for="waktu">Tanggal</label>
							<input required="" type="date" name="waktu" id="waktu" class="form-control">	
						</div>
					</div>	
				</div>
			</div>
			</form>
		</div>
	</div>

	<div class="col-lg-6">
		@if($histori_transaksi->count() > 0)
		<div class="card">
			<div class="card-header">
				Histori Transaksi
			</div>
			<div class="card-body table-responsive">
				<table id="dataTable1" class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Nominal</th>
				      <th scope="col">jenis</th>
				      <th scope="col">Tanggal</th>
				    </tr>
				  </thead>
				  <tbody>
				  	@foreach($histori_transaksi as $histori)
				    <tr>
				      <th scope="row">{{ $loop->iteration }}</th>
				      <td>{{ "Rp" }} @toRupiah($histori->nominal)</td>
				      <td>{{ $histori->jns_transaksi }}</td>
				      <td>
				      	{{ \Carbon\Carbon::parse($histori->waktu)->format('d-m-Y') }}
				      </td>
				    </tr>
				    @endforeach
				  </tbody>
				</table>
			</div>
			
		</div>
		@endif
	</div>

</div>

@stop

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script>
  $(function () {
    $("#dataTable1").DataTable();
    
    $('#dataTable2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush