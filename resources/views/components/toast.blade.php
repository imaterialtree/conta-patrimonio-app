<div class="toast-container position-fixed p-3">
    <div {{ $attributes->class('toast align-items-center border-0 show fade') }} role="alert" aria-live="assertive"
        aria-atomic="true" data-bs-config='{"delay":3000, "autohide":true}'>
        <div class="alert alert-{{ $type }} alert-dismissible show fade" role="alert">
            <div>{{ $slot }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
