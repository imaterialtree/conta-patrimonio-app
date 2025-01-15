<button class="btn text-danger" type="button" data-bs-toggle="modal" title="Excluir Departamento"
    data-bs-target="#deleteDepartamento{{ $departamento->id }}">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="deleteDepartamento{{ $departamento->id }}" tabindex="-1"
    aria-labelledby="deleteDepartamentoLabel{{ $departamento->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteDepartamentoLabel{{ $departamento->id }}">
                    {{ __('Tem certeza que deseja excluir esse departamento?') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ route('departamentos.destroy', $departamento->id) }}" class="p-6">
                    @csrf
                    @method('delete')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ __('Excluir Departamento') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
