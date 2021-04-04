@extends('layouts.backend.app',[
	'title' => 'Setor',
	'contentTitle' => 'Setor',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<div class="row">
	
	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">Entri Setor</div>
			<div class="card-body">
			<form method="POST" action="{{ route('setor.store') }}">
				@csrf
						<div class="form-group">
							<label for="no_rekening">No Rekening</label>
							<select required="" name="no_rekening" id="no_rekening" class="form-control">
								<option disabled="" selected="">- PILIH NO REKENING -</option>
								@foreach($nasabah as $nsb)
									<option value="{{ $nsb->no_rekening }}">{{ $nsb->no_rekening." (".$nsb->nm_nasabah.")" }}</option>
								@endforeach
							</select>
						</div>

						<div class="form-group">
							<label for="nominal">Nominal</label>
							<input required="" type="number" placeholder="Nominal" name="nominal" id="nominal" class="form-control">
						</div>

						<div id="keterangan" class="keterangan">
							
						</div>

						<div class="form-group">
							<label for="waktu">Tanggal</label>
							<input required="" type="date" name="waktu" id="waktu" class="form-control">	
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary">KONFIRMASI</button>
						</div>
			</form>
		</div>
		</div>
	</div>

	<div class="col-lg-8">
		@if($histori_setor->count() > 0)
		<div class="card">
			<div class="card-header">Histori Setor</div>
				<div class="card-body table-responsive">
						<table id="dataTable1" class="table">
						  <thead>
						    <tr>
						      <th scope="col">#</th>
						      <th scope="col">Nasabah</th>
						      <th scope="col">Nominal</th>
						      <th scope="col">Tanggal</th>
						    </tr>
						  </thead>
						  <tbody>
						  	@foreach($histori_setor as $histori)
						    <tr>
						      <th scope="row">{{ $loop->iteration }}</th>
						      <td>{{ $histori->nm_nasabah }}</td>
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
		</div>
		@endif
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