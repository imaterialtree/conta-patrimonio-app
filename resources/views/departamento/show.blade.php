@extends('layouts.app')

@section('content')
    <!-- Cartão de Editar Departamento -->
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm text-center p-4 h-100" style="border-radius: 8px;">
            <i class="bi bi-building" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-2">Editar</h5>
            <a href="{{ route('departamentos.edit', $departamento) }}" class="stretched-link"></a>
        </div>
    </div>
    <div class="card mx-auto">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Visualizar Departamento</h2>
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <p class="form-control">{{ $departamen->titulo }}</p>
            </div>

            <div class="mb-3">
                <label class="form-label">Código</label>
                <p class="form-control">{{ $departamen->codigo }}</p>
            </div>
        </div>
    </div>

    <div class="card mx-auto">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Patrimônios</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        {{-- <th>Valor</th> --}}
                        <th>Classificação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departamento->patrimonios as $patrimonio)
                        <tr>
                            <td>{{ $patrimonio->nome }}</td>
                            <td>{{ $patrimonio->descricao }}</td>
                            {{-- <td>{{ $patrimonio->valor }}</td> --}}
                            <td>{{ $patrimonio->classificacao->titulo }}</td>
                        </tr>
                    @endforeach
                </tbody>
                @endforeach
            </table>
        </div>
    </div>
@endsection
