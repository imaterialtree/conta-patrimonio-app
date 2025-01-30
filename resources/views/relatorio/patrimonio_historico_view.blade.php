@extends('layouts.app')

@section('titulo', 'Histórico de Movimentação do Patrimônio')

@section('content')
    <div class="row mb-3">
        <h2>Histórico de Movimentação do Patrimônio: {{ $patrimonio->codigo }}</h2>
    </div>
    <div class="mb-3">
        <a href="{{ route('relatorios.historico_movimentacao.pdf', request()->all()) }}" class="btn btn-primary">
            <i class="bi bi-printer"></i> Imprimir
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audits as $audit)
                <tr>
                    <td>{{ $audit->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ DepartamentoHelper::getDepartamentoTitulo($audit->new_values['departamento_id']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
