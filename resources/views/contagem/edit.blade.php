@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Editar Contagem</h2>

        <!-- Seção de Comissão -->
        <div class="row">
            <!-- Membros da Comissão -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 p-3 h-100">
                    <h5 class="card-title">Membros da comissão</h5>
                    <table id="tabela-membros-comissao" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contagem->usuariosComissao as $membro)
                                <tr>
                                    <td>{{ $membro['nome'] }}</td>
                                    <td>{{ $membro['email'] }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger mover-para-servidores"
                                            value="{{ $membro->id }}">
                                            <i class="bi bi-arrow-right-circle"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Servidores Disponíveis -->
            <div class="col-md-6">
                <div class="card shadow-sm border-0 p-3 h-100">
                    <h5 class="card-title">Servidores disponíveis</h5>
                    <table id="tabela-servidores" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Ações</th>
                                <th>Nome</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($membros as $membro)
                                @if (!$contagem->usuariosComissao->contains($membro))
                                    <tr>
                                        <td>
                                            <button class="btn btn-sm btn-primary mover-para-comissao"
                                                value="{{ $membro->id }}">
                                                <i class="bi bi-arrow-left-circle"></i>
                                            </button>
                                        </td>
                                        <td>{{ $membro['nome'] }}</td>
                                        <td>{{ $membro['email'] }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Botão Atualizar Contagem -->
        <form action="{{ route('contagens.update', $contagem) }}" method="POST" id="formulario" onsubmit="enviar()">
            @csrf
            @method('PUT')
            {{-- Inputs preenchidos por JS --}}
            <div class="mt-4 text-center">
                <button class="btn btn-primary btn-lg">
                    Atualizar contagem
                </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        let membros = @json($contagem->usuariosComissao->pluck('id'));
        document.addEventListener('DOMContentLoaded', () => {
            const tabelaComissao = document.querySelector('#tabela-membros-comissao tbody');
            const tabelaServidores = document.querySelector('#tabela-servidores tbody');

            // Função para mover da tabela de servidores para a comissão
            tabelaServidores.addEventListener('click', (event) => {
                const botao = event.target.closest('.mover-para-comissao')
                if (botao) {
                    const linha = event.target.closest('tr');
                    const celula = event.target.closest('td');
                    $(botao).addClass('btn-danger mover-para-servidores');
                    $(botao).removeClass('btn-primary mover-para-comissao');
                    botao.innerHTML = `<i class="bi bi-arrow-right-circle"></i>`;

                    membros.push(botao.value);
                    linha.removeChild(celula);
                    linha.appendChild(celula);
                    tabelaComissao.appendChild(linha);
                }
            });

            // Função para mover da tabela de comissão para os servidores
            tabelaComissao.addEventListener('click', (event) => {
                const botao = event.target.closest('.mover-para-servidores');
                if (botao) {
                    const linha = event.target.closest('tr');
                    const celula = event.target.closest('td');

                    $(botao).addClass('btn-primary mover-para-comissao');
                    $(botao).removeClass('btn-danger mover-para-servidores');
                    botao.innerHTML = `<i class="bi bi-arrow-left-circle"></i>`;

                    var index = membros.indexOf(parseInt(botao.value));
                    if (index !== -1) {
                        membros.splice(index, 1);
                    }
                    linha.removeChild(celula);
                    linha.insertBefore(celula, linha.firstChild);
                    tabelaServidores.appendChild(linha);
                }
            });
        });

        function enviar() {
            membros.forEach(valor => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'membros[]';
                input.value = valor;

                document.getElementById('formulario').appendChild(input);
            });
            document.getElementById('formulario').submit();
        }
    </script>
@endpush
