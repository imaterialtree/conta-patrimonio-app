@extends('layouts.comissao')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-center">
            <h3>Contagens em Andamento</h3>
        </div>
    </div>

    <!-- Cartão de Contagem em Andamento -->
    <div class="col-md-4 mb-3">
        <div class="card border-0 shadow-sm text-center p-4 h-100" style="border-radius: 8px;">
            <i class="bi bi-clipboard-check" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-2">Há uma contagem em andamento</h5>
            <a href="{{ route('contagens.create') }}" class="stretched-link"></a>

            <div class="card-body">
                <p class="text-secondary">Clique aqui para começar a contagem</p>
            </div>
        </div>
    </div>
@endsection
