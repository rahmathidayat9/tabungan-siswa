<form method="POST" action="{{ route($route) }}">
	@csrf
	{{ $slot }}
	<button class="btn btn-primary btn-sm" type="submit">SIMPAN</button>
</form>