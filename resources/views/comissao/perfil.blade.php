@extends('layouts.comissao')

@section('content')
    <div class="card mx-auto">
        <div class="card-body">
            <div class="position-absolute end-0 me-3">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Sair
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
            <h2 class="card-title h4 mb-4">Perfil</h2>

            <div class="d-flex flex-column align-items-center mb-4">
                {{-- <img src="{{ asset(auth()->user()->icone) }}" alt="User Icon" class="rounded-circle" width="100" height="100"> --}}
                <i class="fas fa-user-circle fa-3x mb-2"></i>
                {{-- <a href="#">Alterar foto de perfil</a> --}}
            </div>
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Nome de Usuário:</strong>
                    <span>{{ $usuario->nome }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Email:</strong>
                    <span>{{ $usuario->email }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>SIAPE:</strong>
                    <span>{{ $usuario->siape }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <strong>Tipo:</strong>
                    <span>{{ $usuario->tipo }}</span>
                </li>
            </ul>
        </div>
    </div>
@endsection
