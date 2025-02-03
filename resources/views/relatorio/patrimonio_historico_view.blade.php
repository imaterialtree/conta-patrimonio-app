@extends('layouts.app')

@section('titulo', 'Histórico do Patrimônio')

@section('content')
    <div class="row mb-3">
        <h2>Histórico de Alterações do Patrimônio: {{ $patrimonio->codigo }}</h2>
    </div>
    <p>Mostra todas as alterações feitas nas informações do patrimônio, como descrição, classificação e setor</p>
    <div class="mb-3">
        <a href="{{ route('relatorios.historico_movimentacao.pdf', request()->all()) }}" class="btn btn-primary">
            <i class="bi bi-printer"></i> Imprimir
        </a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Mudanças</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audits as $audit)
                <tr>
                    <td>{{ $audit->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <ul class="list-unstyled">
                            @if ($audit->event == 'created')
                                <li>Criado</li>
                                @continue
                            @endif
                            @foreach ($audit->getModified() as $attribute => $modified)
                                <li>
                                    <strong>{{ $attribute }}</strong>:
                                    de <span class="text-danger">
                                        @if ($attribute == 'departamento_id')
                                            {{ DepartamentoHelper::getDepartamentoTitulo($modified['old']) }}
                                        @elseif ($attribute == 'classificacao_id')
                                            {{ ClassificacaoEnum::fromId($modified['old'])->value }}
                                        @else
                                            {{ $modified['old'] ?? 'N/A' }}
                                        @endif
                                    </span>
                                    para <span class="text-success">
                                        @if ($attribute == 'departamento_id')
                                            {{ DepartamentoHelper::getDepartamentoTitulo($modified['new'] ?? '') }}
                                        @elseif ($attribute == 'classificacao_id')
                                            {{ ClassificacaoEnum::fromId($modified['new'] ?? '')->value }}
                                        @else
                                            {{ $modified['new'] ?? 'N/A' }}
                                        @endif
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
