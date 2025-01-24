@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <h2>Usuários</h2>
    </div>

    <div class="mb-4 row">
        <div class="col-md-4">
            <x-card-btn>
                <i class="bi bi-person-plus-fill fs-2"></i>
                <h5 class="card-title mt-2">Novo Usuário</h5>
                <a href="{{ route('usuarios.create') }}" class="stretched-link"></a>
            </x-card-btn>
        </div>
        <div class="col-md-4">
            <div class="card border-0 text-center">
                <div class="card-body text-center">
                    <h5 class="card-title">Usuários cadastrados</h5>
                    <p class="display-4">{{ $userCount }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Usuários</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="align-middle">Nome
                            <br>
                            <span class="text-muted">Email</span>
                        </th>
                        <th class="align-middle">Siape</th>
                        <th class="align-middle">Tipo</th>
                        <th class="text-center align-middle" style="width: 1%;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="col-auto align-middle">
                                <strong>{{ $usuario->nome }}</strong> <br>
                                {{ $usuario->email }}
                            </td>
                            <td class="align-middle">{{ $usuario->siape }}</td>
                            <td class="align-middle"><span class="badge bg-secondary text-white">{{ $usuario->tipo }}</span>
                            </td>
                            <td class="align-middle col-2">
                                <div class="d-flex justify-content-around ">
                                    <a href="{{ route('usuarios.edit', $usuario) }}" class="btn text-primary"
                                        title="Editar usuário">
                                        <i class="fa fa-edit"></i>Editar
                                    </a>
                                    <button class="btn text-danger" type="button" data-bs-toggle="modal"
                                        title="Excluir Usuário" data-bs-target="#deleteUsuarioModal"
                                        data-action="{{ route('usuarios.destroy', $usuario) }}">
                                        <i class="fa fa-trash"></i>
                                        Excluir
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <x-delete-modal id="deleteUsuarioModal" />
@endsection
