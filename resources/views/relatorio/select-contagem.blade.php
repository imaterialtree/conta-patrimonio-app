@extends('layouts.app')

@section('titulo', 'Selecionar Contagem')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <h1>Selecionar Contagem</h1>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Criador</th>
                    <th>Status</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contagens as $contagem)
                    <tr>
                        <td>{{ $contagem->criado_em }}</td>
                        <td>{{ $contagem->usuarioCriador->nome }}</td>
                        <td>{{ $contagem->status }}</td>
                        <td>
                            <a href="{{ route('relatorios.contagem.pdf', $contagem) }}" class="btn btn-primary">
                                Gerar Relatório
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
