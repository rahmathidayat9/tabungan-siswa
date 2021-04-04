<div class="{{ $col ?? '' }}">
	<div class="card">
		<div class="card-header">{{ $cardHeader ?? '' }}</div>
		<div class="card-body">
			{{ $slot }}
		</div>
		<div class="card-footer"></div>
	</div>
</div>
