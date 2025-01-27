<div class="fixed-bottom d-flex mx-2 justify-content-around" style="bottom: 70px;">
    <button id="readButton" class="btn btn-primary col-5">
        <span id="buttonText">Ler com RFID</span>
        <div id="buttonSpinner" class="spinner-border spinner-border-sm text-light d-none" role="status">
            <span class="visually-hidden">Carregando...</span>
        </div>
    </button>
    <button class="btn btn-secondary col-5" data-bs-toggle="modal" data-bs-target="#addNotListedModal">
        <i class="fas fa-keyboard"></i> Digitar
    </button>
</div>

<!-- Modal para digitar código do patrimônio -->
<div class="modal fade" id="addNotListedModal" tabindex="-1" aria-labelledby="addNotListedModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNotListedModalLabel">Ver Patrimônio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('comissao.patrimonios.show') }}" method="GET">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="codigoPatrimonio" class="form-label">Código do Patrimônio</label>
                        <input type="text" class="form-control" id="codigoPatrimonio" name="codigo" required
                            placeholder="Digite o código">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite('resources/js/rfid-leitura.js')
