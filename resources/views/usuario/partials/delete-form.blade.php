<button class="btn text-danger" type="button" data-bs-toggle="modal" title="Excluir Usuário"
    data-bs-target="#deleteUsuario{{ $usuario->id }}">
    <i class="fa fa-trash"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="deleteUsuario{{ $usuario->id }}" tabindex="-1"
    aria-labelledby="deleteUsuarioLabel{{ $usuario->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteUsuarioLabel{{ $usuario->id }}">
                    {{ __('Tem certeza que deseja excluir esse usuário?') }}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <form method="post" action="{{ route('usuarios.destroy', $usuario->id) }}" class="p-6">
                    @csrf
                    @method('delete')

                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        {{ __('Cancelar') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ __('Excluir Usuario') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
