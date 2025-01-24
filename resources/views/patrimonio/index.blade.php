@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <div class="row">
            <h1>Patrimônios</h1>
        </div>
    </div>
    <!-- Cartão de Novo Patrimônio -->
    <div class="col-md-4 mb-3">
        <x-card-btn>
            <i class="bi bi-building" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-2">Novo Patrimônio</h5>
            <a href="{{ route('patrimonios.create') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    @foreach ($departamentos as $departamento)
        <div class="me-3">
            <div class="card shadow-sm border-0 p-3 h-100">
                <h5 class="card-title"><strong>Departamento:</strong> {{ $departamento->titulo }}</h5>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descrição</th>
                            <th class="col-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departamento->patrimonios as $patrimonio)
                            <tr>
                                <td>{{ $patrimonio->codigo }}</td>
                                <td>{{ $patrimonio->descricao }}</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{ route('patrimonios.edit', $patrimonio) }}" class="btn text-primary"
                                        title="Editar patrimônio">
                                        <i class="fa fa-edit"></i>
                                        Editar
                                    </a>
                                    {{-- @include('patrimonio.partials.delete-form') --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endsection
