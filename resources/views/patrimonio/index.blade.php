@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <div class="row">
            <h2>Patrimônios</h2>
        </div>
    </div>
    <!-- Cartão de Novo Patrimônio -->
    <div class="col-md-4 mb-3">
        <x-card-btn>
            <i class="bi bi-box-seam fs-2"></i>
            <h5 class="card-title mt-2">Novo Patrimônio</h5>
            <a href="{{ route('patrimonios.create') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    @foreach ($departamentos as $departamento)
        <div class="card p-3 h-100 mb-3">
            <h5 class="card-title mb-3"><strong>Departamento:</strong> {{ $departamento->titulo }}</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
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
