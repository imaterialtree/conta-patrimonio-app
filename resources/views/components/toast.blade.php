@if (session($msgKey))
    <div class="toast-container position-fixed p-3">
        <div class="toast align-items-center text-bg-success border-0 show fade" role="alert" aria-live="assertive"
            aria-atomic="true" data-bs-config='{"delay":3000, "autohide":true}'>
            <div class="d-flex">
                <div class="toast-body">
                    {{ session($msgKey) }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
