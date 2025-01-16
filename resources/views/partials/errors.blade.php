@if ($errors->any())
    <div class="d-flex justify-content-center">
        <x-toast type="danger">
            <ul class="list-unstyled">
                <i class="bi bi-exclamation-circle text-danger"></i>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-toast>
    </div>
@endif
