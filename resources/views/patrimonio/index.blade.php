@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <div class="row">
            <h2>Patrimônios</h2>
        </div>
    </div>
    <div class="row">
        <!-- Cartão de Novo Patrimônio -->
        <div class="col-md-4 mb-3">
            <x-card-btn>
                <i class="bi bi-box-seam fs-2"></i>
                <h5 class="card-title mt-2">Novo Patrimônio</h5>
                <a href="{{ route('patrimonios.create') }}" class="stretched-link"></a>
            </x-card-btn>
        </div>
        <!-- Cartão de Importar Patrimônio -->
        <div class="col-md-4 mb-3">
            <x-card-btn>
                <i class="bi bi-upload fs-2"></i>
                <h5 class="card-title mt-2">Importar Patrimônio</h5>
                <a href="{{ route('patrimonios.index') }}" class="stretched-link"></a>
            </x-card-btn>
        </div>
    </div>

    @foreach ($departamentos as $departamento)
        <div class="card p-3 h-100 mb-3">
            <h5 class="card-title mb-3"><strong>Setor:</strong> {{ $departamento->titulo }}</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Descrição</th>
                        <th class="text-center" style="width: 1%;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departamento->patrimonios as $patrimonio)
                        <tr>
                            <td>{{ $patrimonio->codigo }}</td>
                            <td>{{ $patrimonio->descricao }}</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn text-primary" href="{{ route('patrimonios.show', $patrimonio) }}">
                                    <i class="fas fa-eye"></i>
                                    Ver
                                </a>
                                <a href="{{ route('patrimonios.edit', $patrimonio) }}" class="btn text-primary"
                                    title="Editar patrimônio">
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                                <button class="btn text-danger" type="button" data-bs-toggle="modal"
                                    title="Excluir Patrimônio" data-bs-target="#deletePatrimonioModal"
                                    data-action="{{ route('patrimonios.destroy', $patrimonio) }}">
                                    <i class="fa fa-trash"></i>
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
    <x-delete-modal id="deletePatrimonioModal" />
@endsection
