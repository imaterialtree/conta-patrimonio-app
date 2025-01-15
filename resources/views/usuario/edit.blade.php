@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Editar Usuário</h2>

            <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
                @csrf
                @method('PUT')
                <x-input type="text" id="nome" name="nome" value="{{ $usuario->nome }}">Nome</x-input>
                <x-input type="email" id="email" name="email" value="{{ $usuario->email }}">Email</x-input>
                <x-input type="number" id="siape" name="siape" value="{{ $usuario->siape }}">SIAPE</x-input>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select id="tipo" name="tipo" class="form-select">
                        <option value="admin" @selected($usuario->isAdmin())>Administrador do sistema</option>
                        <option value="comissao" @selected(!$usuario->isAdmin())>Membro da Comissão de Contagem</option>
                    </select>
                    @error('tipo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Salvar Mudanças</button>
            </form>
        </div>
    </div>
@endsection
