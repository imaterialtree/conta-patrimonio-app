@props(['id', 'title' => 'Tem certeza que deseja excluir?', 'buttonText' => 'Excluir'])

<!-- Modal -->
<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $id }}Label">{{ $title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form method="post" class="p-6">
                    @csrf
                    @method('delete')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ $buttonText }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('{{ $id }}');
            deleteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const action = button.getAttribute('data-action');
                const form = deleteModal.querySelector('form');
                form.setAttribute('action', action);
            });
        });
    </script>
@endpush
