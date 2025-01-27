<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Histórico de Movimentação do Patrimônio</title>
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
    <h2>Histórico de Movimentação do Patrimônio: {{ $patrimonio->codigo }}</h2>

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Usuário</th>
                <th>Departamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audits as $audit)
                <tr>
                    <td>{{ $audit->created_at }}</td>
                    <td>{{ $audit->user->name ?? 'Sistema' }}</td>
                    <td>{{ DepartamentoHelper::getDepartamentoTitulo($audit->new_values['departamento_id']) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
