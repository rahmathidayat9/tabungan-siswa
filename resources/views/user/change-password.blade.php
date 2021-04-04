@extends('layouts.backend.app',[
	'title' => 'Ubah Password',
    'contentTitle' => 'Ubah Password',
])
@section('content')
<x-alert></x-alert>
<div class="row">
	<x-card>
		<x-slot name="col">col-lg-6</x-slot>
		<x-slot name="cardHeader">Ubah Password</x-slot>
			<x-edit>
				<x-slot name="action">{{ route('user.change-password.update') }}</x-slot>
				<div class="form-group">
					<label for="password">Ubah Password</label>
					<input name="password" type="password" class="form-control @error('password') is-invalid @enderror" id="password">
					@error('password')
						<div class="invalid-feedback">
							{{ $message }}
						</div>
					@enderror
				</div>
			</x-edit>
	</x-card>
</div>
@stop 