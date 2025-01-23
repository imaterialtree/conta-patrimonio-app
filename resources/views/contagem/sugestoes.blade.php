@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('contagens.show', $contagem) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
        <h1>Sugestões de Mudança de Classificação para a Contagem</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Patrimônio</th>
                    <th>Classificação Antiga</th>
                    <th>Classificação Proposta</th>
                    <th>Justificativa</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patrimoniosContados as $contado)
                    <tr>
                        <td>{{ $contado->patrimonio->departamento->titulo }}</td>
                        <td>{{ $contado->patrimonio->descricao }}</td>
                        <td>{{ $contado->patrimonio->classificacao->titulo }}</td>
                        <td>{{ $contado->classificacaoProposta->titulo }}</td>
                        <td>{{ $contado->justificativa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
