<div class="progress my-3" style="position: relative;">
    <div class="progress-bar bg-success" role="progressbar" style="width: {{ (($progress-$min) / $total) * 100 ?: 0 }}%;"
        aria-valuenow="{{ $progress }}" aria-valuemin="{{ $min }}" aria-valuemax="{{ $total }}">
    </div>
    <span style="position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%);">
        {{ $progress }}/{{ $total }}
    </span>
</div>
