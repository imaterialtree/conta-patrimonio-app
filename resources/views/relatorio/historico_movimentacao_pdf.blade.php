<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Histórico de Movimentação de Patrimônio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2>Histórico de Movimentação de Patrimônio</h2>

    <table>
        <thead>
            <tr>
                <th>Código</th>
                <th>Descrição</th>
                <th>Movimentações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patrimonios as $patrimonio)
                <tr>
                    <td>{{ $patrimonio->codigo }}</td>
                    <td>{{ $patrimonio->descricao }}</td>
                    <td>
                        <ul>
                            @foreach ($patrimonio->audits as $audit)
                                <li>{{ $audit->created_at }} - {{ $audit->user->name ?? 'Sistema' }} - {{ DepartamentoHelper::getDepartamentoTitulo($audit->new_values['departamento_id']) }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
