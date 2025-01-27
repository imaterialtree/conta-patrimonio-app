@extends('layouts.app')

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Visualizar Patrimônio</h2>
            <div class="mb-3">
                <label class="form-label">Código</label>
                <p class="form-control">{{ $patrimonio->codigo }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <p class="form-control">{{ $patrimonio->descricao }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Departamento</label>
                <p class="form-control">{{ $patrimonio->departamento->titulo }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Classificação</label>
                <p class="form-control">{{ $patrimonio->classificacao->titulo }}</p>
            </div>
            <div class="text-center">
                <a href="{{ route('relatorios.patrimonio_historico_view', $patrimonio) }}" class="btn btn-secondary">Ver histórico de mudanças</a>
            </div>
        </div>
    </div>
@endsection