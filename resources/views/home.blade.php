@extends('layouts.app')

@section('content')
    <div class="row">
        <h2 class="mb-4">Início</h2>
    </div>

    <div class="row">
        @if ($ultimaContagem)
            <!-- Cartão de Última Contagem -->
            <div class="col-md-4 mb-3">
                <x-card-btn>
                    @if ($ultimaContagem->status == ContagemStatus::FINALIZADO->value)
                        <h5 class="card-title text-muted mb-2">Última contagem há</h5>
                        <p class="display-5">
                            {{ intval($diasDesdeUltimaContagem) }} dia(s)
                        </p>
                    @else
                        <div class="align-middle">
                            <i class="bi bi-hourglass-split fs-2"></i>
                            <p class="card-title text-muted mb-2">Há uma contagem em andamento</p>
                            <h4 class="align-middle">Acompanhar contagem</h4>
                            <a href="{{ route('contagens.show', $ultimaContagem) }}" class="stretched-link"></a>
                        </div>
                    @endif
                </x-card-btn>
            </div>
        @endif

        <!-- Cartão de Nova Contagem -->
        @if (!$ultimaContagem || $ultimaContagem->status != ContagemStatus::EM_ANDAMENTO->value)
            <div class="col-md-4 mb-3">
                <x-card-btn>
                    <i class="bi bi-clipboard-check fs-2"></i>
                    <h5 class="card-title mt-2">Nova Contagem</h5>
                    <a href="{{ route('contagens.create') }}" class="stretched-link"></a>
                </x-card-btn>
            </div>
        @endif

        <!-- Cartão de Importar Patrimônio -->
        <div class="col-md-4 mb-3">
            <x-card-btn>
                <i class="bi bi-upload fs-2"></i>
                <h5 class="card-title mt-2">Importar Patrimônio</h5>
                <a href="{{ route('patrimonios.index') }}" class="stretched-link"></a>
            </x-card-btn>
        </div>
    </div>
@endsection
