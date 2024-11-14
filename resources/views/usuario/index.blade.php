@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="h4">Gerenciar Usuários</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary d-flex align-items-center">
        <i class="bi bi-person-plus-fill me-2"></i> Novo Usuário
    </a>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <h5 class="card-title">Usuários cadastrados</h5>
                <p class="display-4">{{ $userCount }}</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Usuário</h5>
        <ul class="list-group list-group-flush">
            @foreach ($usuarios as $usuario)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $usuario->nome }}</strong><br>
                    <span class="text-muted">{{ $usuario->email }}</span>
                </div>
                <div>
                <a href="{{ route('usuarios.edit', $usuario)}}" class="btn text-primary" title="Editar usuário">
                        <i class="fa fa-edit"></i>
                    </a>
                    @include('usuario.partials.delete-form')
                    <span class="badge bg-secondary text-white">{{ $usuario->tipo }}</span>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
