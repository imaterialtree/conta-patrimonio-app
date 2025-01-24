@extends('layouts.app')

@section('titulo', 'Contagem')

@section('content')
    <div class="mb-3">
        <div class="row">
            <h2>Contagem</h2>
        </div>
    </div>
    <!-- Cartão de Nova Contagem -->
    <div class="col-md-4 mb-3">
        <x-card-btn>
            <i class="bi bi-clipboard-check" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-2">Nova Contagem</h5>
            <a href="{{ route('contagens.create') }}" class="stretched-link"></a>
        </x-card-btn>
    </div>

    <div class="me-3">
        <div class="card p-3 h-100">
            <h5 class="card-title">Contagens</h5>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th>Criado por</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 1%;">Acões</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contagens as $contagem)
                        <tr>
                            <td>{{ $contagem['criado_em'] }}</td>
                            <td>{{ $contagem['finalizado_em'] }}</td>
                            <td>{{ $contagem->usuarioCriador->nome }}</td>
                            <td>
                                <span class="badge text-bg-secondary">{{ $contagem['status'] }}</span>
                            </td>
                            <td><a class="btn text-primary" href="{{ route('contagens.show', $contagem) }}">
                                    <i class="fas fa-eye"></i>
                                    Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
