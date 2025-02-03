@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <div class="row">
            <h2>Setores</h2>
        </div>
    </div>
    <!-- Cartão de Novo Departamento -->
    <div class="col-md-4 mb-3">
        <x-card-btn>
            <i class="bi bi-building-add" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-2">Novo Setor</h5>
            <a href="{{ route('departamentos.create') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Setores</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Título</th>
                        {{-- <th>Código</th> --}}
                        <th class="text-center" style="width: 1%;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departamentos as $departamento)
                        <tr>
                            <td>{{ $departamento->titulo }}</td>
                            {{-- <td>{{ $departamento->codigo }}</td> --}}
                            <td class="d-flex justify-content-around">
                                <a href="{{ route('departamentos.edit', $departamento) }}" class="btn text-primary"
                                    title="Editar departamento">
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                                <button class="btn text-danger" type="button" data-bs-toggle="modal"
                                    title="Excluir Setor" data-bs-target="#deleteDepartamentoModal"
                                    data-action="{{ route('departamentos.destroy', $departamento) }}">
                                    <i class="fa fa-trash"></i>
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-delete-modal id="deleteDepartamentoModal" />
@endsection
