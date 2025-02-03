@extends('layouts.comissao')

@section('content')
    <div class="container my-3">
        <!-- Título -->
        <h5>Levantamento de Inventário</h5>
        <p class="text-muted">Selecione um setor</p>

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
                    {{-- <th class="col-3">Código</th> --}}
                    <th class="col-6">Setor</th>
                    <th class="col-3">Progresso</th>
                </tr>
            </thead>
            <tbody>
                <!-- Exemplo de departamentos preenchidos dinamicamente -->
                @foreach ($departamentos as $departamento)
                    <tr class="{{ $departamento->status_color }} position-relative">
                        {{-- <td>{{ $departamento->codigo }}</td> --}}
                        <td>{{ $departamento->titulo }}</td>
                        <td>
                            {{ $contagem->progressoDepartamento($departamento) }}/{{ $departamento->patrimonios->count() }}
                            <a class="stretched-link"
                                href="{{ route('comissao.contagem.patrimonios.index', [$contagem, $departamento]) }}"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
