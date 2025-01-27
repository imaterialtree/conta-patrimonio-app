@extends('layouts.comissao')

@section('content')
    <div class="row justify-content-center mb-3">
        <div class="text-center">
            <h3>Contagens</h3>
        </div>
    </div>

    <!-- Cartão de Contagem em Andamento -->
    <div class="col-md-4 mb-3 mx-auto">
        <x-card-btn :disabled="!$contagem && !$contagemExiste">
            @if ($contagem)
                <i class="bi bi-clipboard-check fs-2"></i>
                <h5 class="card-title mt-2">Há uma contagem em andamento</h5>
                <a href="{{ route('comissao.contagem.departamentos', $contagem) }}" class="stretched-link"></a>
                <p class="text-secondary">Clique aqui para começar a contagem</p>
            @elseif ($contagemExiste)
                <i class="bi bi-clipboard-plus fs-2"></i>
                <h5 class="card-title mt-2">Há uma contagem em andamento, mas você não faz parte da comissão de
                    contagem
                </h5>
            @else
                <i class="bi bi-clipboard-plus fs-2"></i>
                <h5 class="card-title mt-2">Não há contagem em andamento</h5>
            @endif
        </x-card-btn>
    </div>

    <div class="col-md-4 my-3 mx-auto">
        <x-card-btn>
            <i class="bi bi-box-seam fs-2"></i>
            <h5 class="card-title mt-2">Buscar Patrimônios</h5>
            <a href="{{ route('comissao.patrimonios', $contagem) }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    @include('comissao.partials.botao-leitura')
@endsection
