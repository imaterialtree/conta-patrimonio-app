@extends('layouts.comissao', ['voltarPara' => route('comissao.contagem.departamentos', [$contagem])])

@section('content')
    <div class="container my-3">
        <!-- Título -->
        <p class="h5">Departamento:</p>
        <p class="h6">{{ $departamento->titulo }}</p class="h6">

        <!-- Tabela de patrimonios -->
        <div class="list-group">
            <div class="list-group-item d-none d-md-block">
                <div class="row">
                    <div class="col">Código</div>
                    <div class="col">Descricao</div>
                    <div class="col">Classificação</div>
                </div>
            </div>
            @foreach ($departamento->patrimonios as $patrimonio)
                <div
                    class="list-group-item {{ $contagem->patrimonioStatus($patrimonio)->getBgClass() }} position-relative list-group-item-action">
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
                    </div>
                    <a class="stretched-link"
                        href="{{ route('comissao.contagem.patrimonios.show', [$contagem, $departamento, $patrimonio]) }}"></a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Botão flutuante -->
    <button id="readButton" class="btn btn-primary btn-lg fixed-bottom mx-3" style="bottom: 70px;">
        <span id="buttonText">Ler Patrimonio</span>
        <div id="buttonSpinner" class="spinner-border spinner-border-sm text-light d-none" role="status">
            <span class="visually-hidden">Carregando...</span>
        </div>
    </button>

    <!-- Formulário oculto para contar patrimônio -->
    <form id="countForm" action="{{ route('comissao.contagem.patrimonios.store', [$contagem, $departamento]) }}"
        method="POST" class="d-none">
        @csrf
        <input type="hidden" name="codigo" id="codigo">
    </form>
@endsection

@vite('resources/js/rfid.js')
