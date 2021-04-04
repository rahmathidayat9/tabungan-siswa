@extends('layouts.backend.app',[
	'title' => 'Profile',
    'contentTitle' => 'Profile',
])
@section('content')
<x-alert></x-alert>
<div class="row">
	<x-card>
		<x-slot name="col">col-lg-6 mb-3</x-slot>
		<x-slot name="cardHeader">Profil Saya</x-slot>
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="" disabled="" value="{{ Auth::user()->name }}" class="form-control">
			</div>
			<div class="form-group">
				<label>Username</label>
				<input type="" disabled="" value="{{ Auth::user()->username }}" class="form-control">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="email" disabled="" value="{{ Auth::user()->email }}" class="form-control">
			</div>
	</x-card>
	
	<x-card>
		<x-slot name="col">col-lg-6</x-slot>
		<x-slot name="cardHeader">Edit Profil</x-slot>
		<x-edit>
			<x-slot name="action">{{ route('user.profile.update') }}</x-slot>
				<div class="form-group">
					<label for="name">Nama Lengkap</label>
					<input required name="name" id="name" type="text" value="{{ Auth::user()->name }}" class="form-control">
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input required name="username" id="username" type="text" value="{{ Auth::user()->username }}" class="form-control">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input required name="email" id="email" type="email" value="{{ Auth::user()->email }}" class="form-control">
				</div>
		</x-edit>
	</x-card>
</div>
@stop