@extends('layouts.comissao')

@section('title', 'Contagem de Patrimônio')

@section('content')
    <div class="container mt-3">
        <div class="card mb-3 mx-auto" style="max-width: 540px;">
            <div class="card-body">
                <h5 class="card-title">Marcar como encontrado</h5>
                <p class="card-text">Clique no botão abaixo para marcar este patrimônio como encontrado.</p>

                <form action="{{ route('comissao.contagem.patrimonios.store', [$contagem, $departamento, $patrimonio]) }}"
                    method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Marcar como encontrado</button>
                </form>
            </div>
        </div>

        <form action="{{ route('comissao.contagem.patrimonios.update', [$contagem, $departamento, $patrimonio]) }}"
            method="POST">
            @csrf

            <div class="mb-3 row">
                <strong>Número de Tombamento</strong>
                <p>{{ $patrimonio->codigo }}</p>
            </div>

            <div class="mb-3 row">
                <strong>Descrição</strong>
                <p>{{ $patrimonio->descricao }}</p>
            </div>

            <div class="mb-3 row">
                <strong>Departamento</strong>
                <p>{{ $patrimonio->departamento->titulo }}</p>
            </div>

            <div class="mb-3 row">
                <strong>Classificação</strong>
                <p>{{ $patrimonio->classificacao->titulo }}</p>
            </div>

            <div class="form-group mb-3 row">
                <label for="classificacao_proposta" class="form-label"><strong>Sugerir nova Classificação</strong></label>
                <select id="classificacao_proposta" name="classificacao_proposta" class="form-select">
                    <option value="" selected>Escolha uma classificação</option>
                    @foreach (ClassificacaoEnum::cases() as $classificacao)
                        <option value="{{ $classificacao }}">{{ $classificacao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-check mb-4">
                <input type="checkbox" id="nao_encontrado" name="nao_encontrado" class="form-check-input">
                <label for="nao_encontrado" class="form-check-label">Patrimônio não encontrado</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </form>
    </div>
@endsection
