@extends('layouts.comissao')

@section('content')
    <div class="container my-3">
        <!-- Título -->
        <h5>Contagem de Patrimônio</h5>
        <p class="text-muted">Departamento: {{ $departamento->titulo }}</p>

        <!-- Tabela de patrimonios -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Descricao</th>
                    <th>Classificação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($departamento->patrimonios as $patrimonio)
                    <tr class="{{ $contagem->patrimonioStatus($patrimonio)->getClass() }} position-relative">
                        <td>{{ $patrimonio->codigo }}</td>
                        <td>{{ $patrimonio->descricao }}</td>
                        <td>{{ $patrimonio->classificacao->titulo }}
                            <a class="stretched-link"
                                href="{{ route('comissao.contagem.patrimonios.show', [$contagem, $departamento, $patrimonio]) }}"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
