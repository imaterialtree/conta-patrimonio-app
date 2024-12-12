@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Inventariado</h2>
            </div>
        </div>

        <div class="row">
            <!-- Cartão de Última Contagem -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm bg-light-red text-center p-4 h-100" style="border-radius: 8px;">
                    <h5 class="card-title text-muted mb-2">Última contagem há</h5>
                    <h1 class="display-4 text-danger">138 dias</h1>
                    <p class="text-danger">faltam 42 dias para data limite</p>
                </div>
            </div>

            <!-- Cartão de Nova Contagem -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm text-center p-4 h-100" style="border-radius: 8px;">
                    <i class="bi bi-clipboard-check" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Nova Contagem</h5>
                    <a href="{{ route('contagens.create') }}" class="stretched-link"></a>
                </div>
            </div>

            <!-- Cartão de Importar Patrimônio -->
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm text-center p-4 h-100" style="border-radius: 8px;">
                    <i class="bi bi-upload" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Importar Patrimônio</h5>
                    <p class="text-muted">última importação realizada há 155 dias</p>
                    <a href="{{ route('patrimonio.index') }}" class="stretched-link"></a>
                </div>
            </div>
        </div>
    </div>
@endsection
