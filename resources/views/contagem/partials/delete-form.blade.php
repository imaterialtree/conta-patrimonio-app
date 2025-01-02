<!-- Modal -->
<div class="modal fade" id="cancelarContagem" tabindex="-1" aria-labelledby="cancelarContagemLabel{{ $contagem->id }}"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="cancelarContagemLabel{{ $contagem->id }}">
                    {{ __('Tem certeza que deseja cancelar essa contagem?') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>É possível editar os membros da contagem sem precisar cancelá-la.
                    Se a contagem for cancelada, todo o progresso da contagem será perdido. Faça isso somente se a
                    contagem foi criado por engano. </p>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ route('contagens.cancel', $contagem->id) }}" class="p-6">
                    @csrf
                    @method('delete')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ __('Cancelar Contagem') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
