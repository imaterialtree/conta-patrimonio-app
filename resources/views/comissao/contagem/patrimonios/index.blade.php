@extends('layouts.comissao', ['voltarPara' => route('comissao.contagem.departamentos', [$contagem])])
<style>
    .legend-box {
        display: inline-block;
        width: 20px;
        height: 20px;
        border-radius: 3px;
    }
</style>
@section('content')
    <div class="container my-3">
        <!-- Título -->
        <p class="h5">Departamento:</p>
        <p class="h6">{{ $departamento->titulo }}</p class="h6">

        <!-- Legenda de Cores -->
        <div class="d-flex align-items-center flex-wrap gap-2 mb-3">
            <div class="d-flex align-items-center">
                <i class="legend-box bg-white border border-secondary me-2"></i>
                <span>Não Lido</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="legend-box bg-success me-2"></span>
                <span>Lido</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="legend-box bg-danger me-2"></span>
                <span>Não Encontrado</span>
            </div>
            <div class="d-flex align-items-center">
                <span class="legend-box bg-warning me-2"></span>
                <span>Pertence a Outro Departamento</span>
            </div>
        </div>

        <!-- Tabela de patrimonios -->
        <div class="list-group">
            <div class="list-group-item d-none d-md-block">
                <div class="row">
                    <div class="col">Código</div>
                    <div class="col">Descricao</div>
                    <div class="col">Classificação</div>
                    <div class="col">Classificação proposta</div>
                </div>
            </div>
            @foreach ($patrimonios as $patrimonio_contagem)
                @php
                    $patrimonio = $patrimonio_contagem['patrimonio'];
                    $contado = $patrimonio_contagem['contado'];
                @endphp
                <div
                    class="list-group-item {{ $contagem->patrimonioStatus($patrimonio)->getBgClass() }} position-relative list-group-item-action border-bottom">
                    <div class="d-md-none">
                        <div class="row"><span><strong>Código:</strong> {{ $patrimonio->codigo }}</span></div>
                        <div class="row"><span><strong>Descricao:</strong> {{ $patrimonio->descricao }}</span></div>
                        <div class="row"><span><strong>Classificação:</strong>
                                {{ $patrimonio->classificacao->titulo }}</span>
                        </div>
                        <div class="row"><span><strong>Classificação proposta:</strong>
                                {{ $contado?->classificacaoProposta?->titulo }}</span>
                        </div>
                    </div>
                    <div class="row d-none d-md-flex">
                        <div class="col">{{ $patrimonio->codigo }}</div>
                        <div class="col">{{ $patrimonio->descricao }}</div>
                        <div class="col">{{ $patrimonio->classificacao->titulo }}
                        </div>
                        <div class="col ms-auto">
                            {{ $contado?->classificacaoProposta?->titulo }}
                        </div>
                    </div>

                    <a class="stretched-link"
                        href="{{ route('comissao.contagem.patrimonios.show', [$contagem, $departamento, $patrimonio]) }}"></a>
                </div>
            @endforeach

            @foreach ($patrimoniosForaDeLugar as $patrimonio)
                <div class="list-group-item bg-warning bg-opacity-25 position-relative list-group-item-action">
                    <div class="d-md-none">
                        <div class="row"><span><strong>Código:</strong> {{ $patrimonio->codigo }}</span></div>
                        <div class="row"><span><strong>Descricao:</strong> {{ $patrimonio->descricao }}</span></div>
                        <div class="row"><span><strong>Classificação:</strong>
                                {{ $patrimonio->classificacao->titulo }}</span></div>
                    </div>
                    <div class="row d-none d-md-flex">
                        <div class="col">{{ $patrimonio->codigo }}</div>
                        <div class="col">{{ $patrimonio->descricao }}</div>
                        <div class="col">{{ $patrimonio->classificacao->titulo }}
                        </div>
                        <div class="col">
                        </div>
                    </div>
                    <a class="stretched-link"
                        href="{{ route('comissao.contagem.patrimonios.show', [$contagem, $departamento, $patrimonio]) }}"></a>
                </div>
            @endforeach
        </div>
        <div style="height: 70px;"></div>
        <!-- Botão flutuante -->
        <div class="fixed-bottom d-flex mx-2 justify-content-around" style="bottom: 70px;">
            <button id="readButton" class="btn btn-primary col-5">
                <span id="buttonText">Ler Patrimonio</span>
                <div id="buttonSpinner" class="spinner-border spinner-border-sm text-light d-none" role="status">
                    <span class="visually-hidden">Carregando...</span>
                </div>
            </button>
            <button class="btn btn-secondary col-5" data-bs-toggle="modal" data-bs-target="#addNotListedModal">
                <i class="fas fa-question"></i> Não listado
            </button>
        </div>
    </div>

    <!-- Formulário oculto para contar patrimônio -->
    <form id="countForm" action="{{ route('comissao.contagem.patrimonios.store', [$contagem, $departamento]) }}"
        method="POST" class="d-none">
        @csrf
        <input type="hidden" name="codigo" id="codigo">
    </form>
@endsection

<!-- Modal para adicionar patrimônio não listado -->
<div class="modal fade" id="addNotListedModal" tabindex="-1" aria-labelledby="addNotListedModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNotListedModalLabel">Adicionar Patrimônio Não Listado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('comissao.contagem.patrimonios.store', [$contagem, $departamento]) }}"
                method="POST">
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
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@vite('resources/js/rfid.js')
