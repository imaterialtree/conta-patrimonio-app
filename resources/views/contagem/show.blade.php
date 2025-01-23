@extends('layouts.app')

@section('titulo', 'Contagem')

@section('content')
    <div class="right_col" role="main">
        <div class="mb-3">
            <div class="row">
                <h1>Contagem</h1>
            </div>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="card shadow-sm border-0 p-3">
                    <h5 class="card-title">Detalhes da Contagem</h5>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>Data de Início</th>
                                <td>{{ $contagem['criado_em'] }}</td>
                            </tr>
                            <tr>
                                <th>Data de Fim</th>
                                <td>{{ $contagem['finalizado_em'] }}</td>
                            </tr>
                            <tr>
                                <th>Criado por</th>
                                <td>{{ $contagem->usuarioCriador->nome }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><span class="badge text-bg-secondary">{{ $contagem['status'] }}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm border-0 p-3">
                    <h5 class="card-title">Membros da Comissão de Contagem</h5>
                    <table id="tabela-servidores" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contagem->usuariosComissao as $membro)
                                <tr>
                                    <td>{{ $membro['nome'] }}</td>
                                    <td>{{ $membro['email'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <h1 class="mb-3">Progresso da Contagem</h1>
            @if ($contagem->status == \App\Enums\ContagemStatus::CANCELADO->value)
                <div class="alert alert-danger" role="alert">
                    Esta contagem foi cancelada.
                </div>
            @endif
            <x-progress-bar current="{{ $contagem->progresso() }}" total="{{ $patrimonioTotal }}" />

            @if (is_null($contagem->finalizado_em) && $contagem->status == 'Em andamento')
                <form action="{{ route('contagens.finalizar', $contagem->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning col-12" @disabled(!$contagem->podeFinalizar())>
                        Finalizar contagem
                    </button>
                </form>
                <button class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#cancelarContagem">
                    Cancelar contagem
                </button>
                @include('contagem.partials.cancel-form')
            @endif

        </div>
        
        <div class="row">
            <h2>Progresso por Departamentos</h2>
        </div>
        <div class="row">
            <div class="card shadow-sm border-0 p-3">
                <h5 class="card-title">Membros da Comissão de Contagem</h5>
                <table id="tabela-servidores" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Departamento</th>
                            <th>Patrimônios Contados</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departamentos as $departamento)
                            <tr>
                                <td>{{ $departamento['titulo'] }}</td>
                                <td>
                                    <x-progress-bar current="{{ $contagem->progressoDepartamento($departamento) }}"
                                        total="{{ $departamento->patrimonios->count() }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
