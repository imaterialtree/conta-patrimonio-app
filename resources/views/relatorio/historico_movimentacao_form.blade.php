@extends('layouts.app')

@section('titulo', 'Histórico de Movimentação de Patrimônio')

@section('content')
    <div class="row mb-3">
        <h2>Histórico de Movimentação de Patrimônio</h2>
    </div>
    <p>Mostra os setores em que o patrimônio esteve</p>

    <h4>Filtros</h4>
    <p>Todos os filtros são opcionais</p>

    <form action="{{ route('relatorios.historico_movimentacao.view') }}" method="GET">
        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="data_inicio" class="form-label">Data de Início</label>
                <input type="date" class="form-control" id="data_inicio" name="data_inicio">
            </div>
            <div class="mb-3 col-md-6">
                <label for="data_fim" class="form-label">Data Final</label>
                <input type="date" class="form-control" id="data_fim" name="data_fim">
            </div>
        </div>

        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select class="form-control" id="departamento_id" name="departamento_id">
                <option value="">Selecione um departamento</option>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}">{{ $departamento->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="movimentado" name="movimentado">
            <label class="form-check-label" for="movimentado">Apenas patrimônios movimentados</label>
        </div>

        <button type="submit" class="btn btn-primary">Gerar Relatório</button>
    </form>
@endsection
