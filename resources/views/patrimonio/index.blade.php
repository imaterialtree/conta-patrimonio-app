@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <div class="row">
            <h1>Patrimônios</h1>
        </div>
    </div>
    <!-- Cartão de Novo Patrimônio -->
    <div class="col-md-4 mb-3">
        <x-card-btn>
            <i class="bi bi-building" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-2">Novo Patrimônio</h5>
            <a href="{{ route('patrimonios.create') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Patrimônios</h5>
            <ul class="list-group list-group-flush">
                @foreach ($patrimonios as $patrimonio)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $patrimonio->codigo }}</strong><br>
                            <span class="text-muted">{{ $patrimonio->descricao }}</span>
                        </div>
                        <div>
                            <a href="{{ route('patrimonios.edit', $patrimonio) }}" class="btn text-primary"
                                title="Editar patrimônio">
                                <i class="fa fa-edit"></i>
                            </a>
                            @include('patrimonio.partials.delete-form')
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
