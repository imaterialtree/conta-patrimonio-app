@extends('layouts.app')

@section('titulo', 'Relatórios')

@section('content')
    <div class="row mb-3">
        <h2>Relatórios</h2>
    </div>

    <div class="row mb-3 col-6">
        <x-card-btn>
            <i class="bi bi-clipboard-data fs-2"></i>
            <h4>Relatório de contagem</h4>
            <a href="{{ route('relatorios.contagem') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    <div class="row mb-3 col-6">
        <x-card-btn>
            <i class="bi bi-clock-history fs-2"></i>
            <h4>Histórico de Movimentação de Patrimônio</h4>
            <a href="{{ route('relatorios.historico_movimentacao') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>
@endsection
