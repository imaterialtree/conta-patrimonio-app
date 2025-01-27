@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Histórico de Alterações do Patrimônio</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Usuário</th>
                    <th>Alterações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($audits as $audit)
                    <tr>
                        <td>{{ $audit->created_at }}</td>
                        <td>{{ $audit->user->name ?? 'Sistema' }}</td>
                        <td>
                            <ul>
                                @foreach ($audit->getModified() as $attribute => $modified)
                                    <li>{{ $attribute }}: {{ $modified['old'] ?? null }} ->
                                        {{ $modified['new'] ?? null }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
