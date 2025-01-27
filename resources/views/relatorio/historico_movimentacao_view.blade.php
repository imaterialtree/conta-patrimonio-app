@extends('layouts.app')

@section('titulo', 'Histórico de Movimentação de Patrimônio')

@section('content')
    <div class="row mb-3">
        <h2>Histórico de Movimentação de Patrimônio</h2>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Movimentações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patrimonios as $patrimonio)
                <tr>
                    <td>{{ $patrimonio->codigo }}</td>
                    <td>{{ $patrimonio->descricao }}</td>
                    <td>
                        <ul>
                            @foreach ($patrimonio->audits as $audit)
                                <li>{{ $audit->created_at }} - {{ $audit->user->name ?? 'Sistema' }} - {{ $audit->departamento_titulo }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
