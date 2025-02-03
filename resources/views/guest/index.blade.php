@extends('layouts.guest')

@section('content')
    <div class="row justify-content-center mb-3 text-center">
        <div class="text-center">
            <img src="{{ asset('logo.svg') }}" alt="Logo" class="img-fluid col-1">
            <h1>Conta Patrimônio</h1>
        </div>
    </div>

    <div class="mt-3 text-center">
        <p>Bem-Vindo ao Conta Patrimônio. <br \>
            Veja a lista completa de patriônios ou use os botões a abaixo para pesquisar um
            Patrimônio específico.
        </p>
    </div>

    <div class="col-md-4 mb-3 mx-auto">
        <x-card-btn>
            <i class="bi bi-box-seam fs-2"></i>
            <h5 class="card-title mt-2">Ver Lista de Patrimônios</h5>
            <a href="{{ route('guest.patrimonios.index') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    <div class="col-md-4 mb-3 mx-auto">
        <x-card-btn>
            <i class="bi bi-search fs-2"></i>
            <h5 class="card-title mt-2">Pesquisar por número de patrimônio</h5>
            <a href="{{ route('guest.patrimonios.index') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    @include('comissao.partials.botao-leitura', [
        'route' => route('guest.patrimonios.show'),
        'marginBottom' => '2em',
    ])
@endsection
