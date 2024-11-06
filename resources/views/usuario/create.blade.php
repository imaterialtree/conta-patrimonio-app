<!-- resources/views/usuarios/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
        <h2 class="card-title h4 mb-4">Criar novo usuário</h2>
        
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome de Usuário</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="@username123">
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="email@domain.com">
            </div>
            
            <div class="mb-3">
                <label for="siape" class="form-label">SIAPE</label>
                <input type="text" id="siape" name="siape" class="form-control" placeholder="Número do SIAPE">
            </div>
            
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo</label>
                <select id="tipo" name="tipo" class="form-select">
                    <option value="Administrador">Administrador</option>
                    <option value="Usuário">Usuário</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Salvar Mudanças</button>
        </form>
    </div>
</div>
@endsection
