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

            <div class="col-md-4">
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Data de Início</li>
                    <li class="list-group-item w-50">{{ $contagem['criado_em'] }}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Data de Fim</li>
                    <li class="list-group-item w-50">{{ $contagem['finalizado_em'] }}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Criado por</li>
                    <li class="list-group-item w-50">{{ $contagem->usuarioCriador->nome }}</li>
                </ul>
                <ul class="list-group list-group-horizontal">
                    <li class="list-group-item w-50">Status</li>
                    <li class="list-group-item w-50"><span class="badge text-bg-secondary">{{ $contagem['status'] }}</span>
                    </li>
                </ul>
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
            <h1>Progresso da Contagem</h1>
            <x-progress-bar current="{{ $contagem->progresso() }}" total="{{ $patrimonioTotal }}" />

            @if (is_null($contagem->finalizado_em))
                <form action="{{ route('contagens.finalizar', $contagem->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-warning col-12" @disabled(!$contagem->podeFinalizar())>
                        Finalizar contagem
                    </button>
                </form>
            @endif

            <button class="btn btn-link text-danger" data-bs-toggle="modal" data-bs-target="#cancelarContagem">
                Cancelar contagem
            </button>
            @include('contagem.partials.cancel-form')
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
