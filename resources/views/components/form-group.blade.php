<div class="form-group">
	<label for="{{ $form ?? '' }}">{{ $label ?? '' }}</label>
	{{ $slot }}
	<input name="{{ $form ?? '' }}" type="{{ $type ?? '' }}" class="form-control {{ $error ?? '' }} is-invalid {{ $enderror ?? '' }}" id="{{ $form ?? '' }}">
	{{ $error ?? '' }}
		<div class="invalid-feedback">
			{{ $message ?? '' }}
		</div>
	{{ $enderror ?? '' }}
</div>