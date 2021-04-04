<form method="POST" action="{{ $action ?? '' }}">
	@csrf
	@method('PATCH')
	{{ $slot }}
	<div class="form-group">
		<button class="btn btn-primary btn-sm" type="submit">UPDATE</button>
	</div>
</form>