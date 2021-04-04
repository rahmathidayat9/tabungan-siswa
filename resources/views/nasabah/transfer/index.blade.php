@extends('layouts.backend.app',[
	'title' => 'Transfer',
	'contentTitle' => 'Transfer',
])

@push('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins') }}/datatables-bs4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

@include('layouts.components.alert-dismissible')

<div class="row">
	
	<div class="col-lg-8">
		<div class="card">
			<div class="card-header">Entri Transfer</div>
			<div class="card-body">
			<form method="POST" action="{{ route('nasabah.transfer.store') }}">
				@csrf

					<div class="row">
						<div class="col-lg-6">
							
							<div class="form-group">
								<label for="no_rekening">No Rekening Saya</label>
								<input type="" name="no_rekening" value="{{ $nasabah->no_rekening }}" class="form-control" readonly="">
							</div>
						
						</div>

						<div class="col-lg-6">
							
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="" name="nma" value="{{ $nasabah->nm_nasabah }}" class="form-control" readonly="">
							</div>

						</div>
					</div>
						

						<div class="form-group">
							<label for="nominal">Nominal</label>
							<input required="" type="number" placeholder="Nominal" name="nominal" id="nominal" class="form-control">
						</div>

						<div class="row">
							
							<div class="col-lg-6">
								
								<div class="form-group">
									<label for="rek_tujuan">Rekening Tujuan</label>
									<input required="" type="number" name="rek_tujuan" id="rek_tujuan" class="form-control">
								</div>
							
							</div>
							
							<div class="col-lg-6">
								
								<div class="form-group">
									<label for="jns_pembayaran">Jenis Pembayaran</label>
									<select required="" name="jns_pembayaran" id="jns_pembayaran" class="form-control">
										<option disabled="" selected="">- PILIH JENIS PEMBAYARAN -</option>
										<option value="spp">SPP</option>
										<option value="bangunan">BANGUNAN</option>
										<option value="dll">DLL</option>
									</select>
								</div>

							</div>

						</div>

						<div id="keterangan" class="keterangan">
							
						</div>

						<div class="form-group">
							<label for="waktu">Tanggal</label>
							<input required="" type="date" name="waktu" id="waktu" class="form-control">	
						</div>

						<div class="form-group">
							<label for="keterangan">Keterangan</label>
							<textarea required="" name="keterangan" id="keterangan" class="form-control"></textarea>
						</div>								

						<div class="form-group">
							<button type="submit" class="btn btn-sm btn-primary">KONFIRMASI</button>
						</div>
			</form>
		</div>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="card">
			<div class="card-header">
				Saldo Saya
			</div>	
			<div class="card-body">
				<div class="row ml-2">
					<i class="fas fa-money-bill fa-3x"> </i> <h4 class="ml-4 mt-3"> Rp.@toRupiah($saldo)</h4>	
				</div>
				 
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