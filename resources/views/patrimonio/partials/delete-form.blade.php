<button class="btn text-danger" type="button" data-bs-toggle="modal" title="Excluir Patrimônio"
    data-bs-target="#deletePatrimonio{{ $patrimonio->id }}">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="deletePatrimonio{{ $patrimonio->id }}" tabindex="-1"
    aria-labelledby="deletePatrimonioLabel{{ $patrimonio->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deletePatrimonioLabel{{ $patrimonio->id }}">
                    {{ __('Tem certeza que deseja excluir esse patrimônio?') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ route('patrimonios.destroy', $patrimonio->id) }}" class="p-6">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
            </div>
        </div>
    </div>
</div>