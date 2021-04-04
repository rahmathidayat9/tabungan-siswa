@extends('layouts.backend.app',[
	'title' => 'Home',
    'contentTitle' => 'Home',
])
@section('content')
<div class="jumbotron">
  <h2 class="">Selamat datang , {{ Auth::user()->name }} !</h2>
  <p class="lead">Anda login sebagai : {{ Str::upper(Auth::user()->level) }}.</p>
  <hr class="my-4">
  <p>Tanggal dan waktu : {{ date('d-m-Y') }}</p>
  <a class="btn btn-danger btn-lg" href="javascript:void(0)" id="clock" role="button"></a>
</div>
@stop

@push('js')
<script src="{{ asset('plugins/digital-clock/js/script.js') }}"></script>
@endpush