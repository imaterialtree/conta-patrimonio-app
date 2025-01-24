<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Movimentação de Patrimônio</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Histórico de Movimentação de Patrimônio</h1>
    @foreach ($historico as $codigo => $patrimoniosContados)
        <h2>Patrimônio: {{ $codigo }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Departamento</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patrimoniosContados as $contado)
                    <tr>
                        <td>{{ $contado->criado_em }}</td>
                        <td>{{ $contado->departamento->titulo }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>