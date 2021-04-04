@extends('layouts.backend.app',[
	'title' => 'Histori Transfer',
	'contentTitle' => 'Histori Transfer',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<div class="row">
	<div class="col-lg-8">
	@if($histori_transfer->count() > 0)
	<div class="card">
		<div class="card-header">
			Histori Transfer
		</div>
		<div class="card-body table-responsive">
			<table id="dataTable1" class="table">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nominal</th>
			      <th scope="col">Tanggal</th>
			    </tr>
			  </thead>
			  <tbody>
			  	@foreach($histori_transfer as $histori)
			    <tr>
			      <th scope="row">{{ $loop->iteration }}</th>
			      <td>{{ "Rp" }} @toRupiah($histori->nominal)</td>
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
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">Generate Laporan</div>
			<div class="card-body">
				<form method="POST" action="{{ route('nasabah.laporan.transfer-keluar') }}">
					@csrf
					<div class="form-group">
						<label for="tgl_mulai">Dari Tanggal</label>
						<input type="date" name="tgl_mulai" required="" class="form-control" id="tgl_mulai">
					</div>
					<div class="form-group">
						<label for="tgl_selesai">Sampai Tanggal</label>
						<input type="date" name="tgl_selesai" required="" class="form-control" id="tgl_selesai">
					</div>
					<div class="form-group">
						<button class="btn btn-danger">GENERATE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@stop

@push('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins') }}/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('plugins') }}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
"
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