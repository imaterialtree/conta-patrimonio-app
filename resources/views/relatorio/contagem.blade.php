<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Contagem</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Relatório de Contagem</h1>
    <h2>Detalhes da Contagem</h2>
    <table>
        <tr>
            <th>Data de Início</th>
            <td>{{ $contagem->criado_em }}</td>
        </tr>
        <tr>
            <th>Data de Fim</th>
            <td>{{ $contagem->finalizado_em }}</td>
        </tr>
        <tr>
            <th>Criado por</th>
            <td>{{ $contagem->usuarioCriador->nome }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $contagem->status }}</td>
        </tr>
    </table>

    <h2>Membros da Comissão de Contagem</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contagem->usuariosComissao as $membro)
                <tr>
                    <td>{{ $membro->nome }}</td>
                    <td>{{ $membro->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Progresso da Contagem</h2>
    <p>{{ $contagem->progresso() }} / {{ $patrimonioTotal }}</p>

    <h2>Sugestões de Mudança de Classificação</h2>
    <table>
        <thead>
            <tr>
                <th>Departamento</th>
                <th>Patrimônio</th>
                <th>Classificação Antiga</th>
                <th>Classificação Proposta</th>
                <th>Justificativa</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sugestoes as $contado)
                <tr>
                    <td>{{ $contado->patrimonio->departamento->titulo }}</td>
                    <td>{{ $contado->patrimonio->descricao }}</td>
                    <td>{{ $contado->patrimonio->classificacao->titulo }}</td>
                    <td>{{ $contado->classificacaoProposta->titulo }}</td>
                    <td>{{ $contado->justificativa }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>