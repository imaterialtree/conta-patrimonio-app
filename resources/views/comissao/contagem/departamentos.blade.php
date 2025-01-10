@extends('layouts.comissao')

@section('content')
    <div class="container my-3">
        <!-- Título -->
        <h5>Contagem de Patrimônio</h5>
        <p class="text-muted">Selecione um departamento</p>

        <!-- Barra de pesquisa -->
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-secondary" type="button">
                <i class="bi bi-filter"></i>
            </button>
        </div>

        <!-- Tabela de departamentos -->
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Departamento</th>
                    <th>Progresso</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de departamentos preenchidos dinamicamente -->
                @foreach ($departamentos as $departamento)
                    <tr class="{{ $departamento->status_color }}">
                        <td>{{ $departamento->codigo }}</td>
                        <td>{{ $departamento->titulo }}</td>
                        <td>
                            <span class="badge {{ $departamento->badge_class }}">
                                {{ $departamento->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
