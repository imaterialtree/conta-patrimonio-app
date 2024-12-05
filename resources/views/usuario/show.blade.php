
@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Visualizar Usuário</h2>
            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome de Usuário</label>
                    <p id="nome" class="form-control">{{ $usuario->nome }}</p>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <p id="email" class="form-control">{{ $usuario->email}}</p>
                </div>

                <div class="mb-3">
                    <label for="siape" class="form-label">SIAPE</label>
                    <input type="numeric" id="siape" name="siape" class="form-control" placeholder="Número do SIAPE">
                    <p id="siape" class="form-control">{{ $usuario->siape }}</p>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <<p id="siape" class="form-control">{{ $usuario->tipo }}</p>
                </div>

                <button type="submit" class="btn btn-primary w-100">Salvar Mudanças</button>
            </form>
        </div>
    </div>
@endsection
