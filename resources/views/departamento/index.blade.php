@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <div class="row">
            <h1>Departamentos</h1>
        </div>
    </div>
    <!-- Cartão de Novo Departamento -->
    <div class="col-md-4 mb-3">
        <x-card-btn>
            <i class="bi bi-building" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-2">Novo Departamento</h5>
            <a href="{{ route('departamentos.create') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Departamentos</h5>
            <ul class="list-group list-group-flush">
                @foreach ($departamentos as $departamento)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $departamento->titulo }}</strong><br>
                            <span class="text-muted">{{ $departamento->codigo }}</span>
                        </div>
                        <div>
                            <a href="{{ route('departamentos.edit', $departamento) }}" class="btn text-primary"
                                title="Editar departamento">
                                <i class="fa fa-edit"></i>
                            </a>
                            @include('departamento.partials.delete-form')
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
