@extends('layouts.app')

@section('titulo', 'Selecionar Patrimônio')

@section('content')
    <div class="container">
        <h2>Selecionar Patrimônio</h2>
        <form action="{{ route('relatorios.patrimonio.historico.view') }}" method="GET">
            <div class="mb-3">
                <label for="patrimonio_id" class="form-label">Patrimônio</label>
                <select id="patrimonio_id" name="patrimonio_id" class="form-select" required>
                    @foreach ($patrimonios as $patrimonio)
                        <option value="{{ $patrimonio->id }}">{{ $patrimonio->codigo }} - {{ $patrimonio->descricao }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ver Relatório</button>
        </form>
    </div>
@endsection
