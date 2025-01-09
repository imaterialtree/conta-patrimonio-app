@extends('layouts.comissao')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 text-center">
            <h3>Contagens</h3>
        </div>
    </div>

    <!-- Cartão de Contagem em Andamento -->
    <div class="col-md-4 mb-3 mx-auto">
        <div class="card border-0 shadow text-center p-4" style="border-radius: 8px;">
            @if ($contagem)
                <i class="bi bi-clipboard-check" style="font-size: 2rem;"></i>
                <h5 class="card-title mt-2">Há uma contagem em andamento</h5>
                <a href="{{ route('comissao.contagem.departamentos', $contagem) }}" class="stretched-link"></a>

                <div class="card-body">
                    <p class="text-secondary">Clique aqui para começar a contagem</p>
                @elseif ($contagemExiste)
                    <i class="bi bi-clipboard-plus" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Há uma contagem em andamento, mas você não faz parte da comissão de
                        contagem
                    </h5>
                @else
                    <i class="bi bi-clipboard-plus" style="font-size: 2rem;"></i>
                    <h5 class="card-title mt-2">Não há contagem em andamento</h5>
            @endif
        </div>
    </div>
@endsection
