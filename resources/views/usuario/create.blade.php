@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Criar novo usuário</h2>

            @include('partials.errors')

            <form action="{{ route('usuarios.store') }}" method="POST">
                @csrf
                <x-input type="text" id="nome" name="nome" with-old-value>Nome</x-input>
                <x-input type="email" id="email" name="email" with-old-value>Email</x-input>
                <x-input type="number" id="siape" name="siape" with-old-value>SIAPE</x-input>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select id="tipo" name="tipo" class="form-select">
                        <option value="admin">Administrador do sistema</option>
                        <option value="comissao">Membro da Comissão de Contagem</option>
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
