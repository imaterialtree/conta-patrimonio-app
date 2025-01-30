<div class="container">
    <h2 class="mb-4">Patrimônios por Departamento</h2>

    <form action="{{ route('comissao.patrimonios') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Pesquisar patrimônio..."
                value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Pesquisar</button>
        </div>
    </form>

    @foreach ($departamentos as $titulo => $patrimoniosDepartamento)
        <h3>{{ $titulo }}</h3>
        <div class="table-responsive">
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
                    @foreach ($patrimoniosDepartamento as $patrimonio)
                        <tr>
                            <td>{{ $patrimonio->codigo }}</td>
                            <td>{{ $patrimonio->descricao }}</td>
                            <td>{{ $patrimonio->classificacao->titulo }}</td>
                            <td>{{ $patrimonio->departamento->titulo }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

    <div class="d-flex justify-content-center">
        {{ $patrimonios->links() }}
    </div>
</div>
<div style="height: 70px"></div>
@include('comissao.partials.botao-leitura')
