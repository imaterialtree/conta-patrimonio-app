@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('contagens.show', $contagem) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
        <h1>Patrimônios Encontrados em Local Diferente</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Departamento Esperado</th>
                    <th>Departamento Encontrado</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patrimoniosDiferenteLocal as $patrimonioContado)
                    <tr>
                        <td>{{ $patrimonioContado->patrimonio->descricao }}</td>
                        <td>{{ $patrimonioContado->patrimonio->departamento->titulo }}</td>
                        <td>{{ $patrimonioContado->departamento->titulo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
