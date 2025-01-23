@extends('layouts.app')

@section('titulo', 'Relatórios')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="row">
                <h1>Relatórios</h1>
            </div>
        </div>

        <div class="justify-content-center align-items-center col-10 mx-auto">
            <div class="row mb-3 col-6">
                <x-card-btn>
                    <i class="bi bi-clipboard-data fs-2"></i>
                    <h4>Relatório de contagem</h4>
                </x-card-btn>
            </div>

            <div class="row mb-3 col-6">
                <x-card-btn>
                    <i class="bi bi-clock-history fs-2"></i>
                    <h4>Histórico de Movimentação de Patrimônio</h4>
                </x-card-btn>
            </div>
        </div>
    </div>
@endsection
