@extends('layouts.comissao')

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Visualizar Usuário</h2>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome de Usuário</label>
                <p id="nome" class="form-control">{{ $usuario->nome }}</p>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <p id="email" class="form-control">{{ $usuario->email }}</p>
            </div>

            <div class="mb-3">
                <label for="siape" class="form-label">SIAPE</label>
                <p id="siape" class="form-control">{{ $usuario->siape }}</p>
            </div>

            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <<p id="siape" class="form-control">{{ $usuario->tipo }}</p>
            </div>
        </div>
    </div>
@endsection
