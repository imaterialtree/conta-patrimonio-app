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

        th,
        td {
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Data</th>
                                    <th>Setor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patrimonio->audits as $audit)
                                    <tr>
                                        <td>{{ $audit->created_at->format('d/m/Y H:i') }}</td>
                                        <td>{{ $audit->departamento_titulo }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
