@extends('layouts.comissao')

@section('content')
    <div class="container">
        <h2 class="mb-4">Patrimônios por Departamento</h2>

        <form action="{{ route('comissao.patrimonios') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Pesquisar patrimônio..."
                    value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Pesquisar</button>
            </div>
        </form>

        @foreach ($departamentos as $departamento)
            @if ($departamento->patrimonios->isEmpty())
                @continue
            @endif
            <h3>{{ $departamento->titulo }}</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Descrição</th>
                        <th>Classificação</th>
                        <th>Departamento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departamento->patrimonios as $patrimonio)
                        <tr>
                            <td>{{ $patrimonio->codigo }}</td>
                            <td>{{ $patrimonio->descricao }}</td>
                            <td>{{ $patrimonio->classificacao->titulo }}</td>
                            <td>{{ $departamento->titulo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
    @include('comissao.partials.botao-leitura')
@endsection
