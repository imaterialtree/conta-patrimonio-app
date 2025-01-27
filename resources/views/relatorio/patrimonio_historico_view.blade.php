@extends('layouts.app')

@section('titulo', 'Histórico de Movimentação do Patrimônio')

@section('content')
    <div class="row mb-3">
        <h2>Histórico de Movimentação do Patrimônio: {{ $patrimonio->codigo }}</h2>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Usuário</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audits as $audit)
                <tr>
                    <td>{{ $audit->created_at }}</td>
                    <td>{{ $audit->user->name ?? 'Sistema' }}</td>
                    <td>{{ DepartamentoHelper::getDepartamentoTitulo($audit->new_values['departamento_id']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
