@props(['action', 'method' => 'POST', 'patrimonio' => null])

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <x-input type="text" name="codigo" id="codigo" value="{{ $patrimonio?->codigo }}" with-old-value required>
        Código do Patrimônio
    </x-input>
    <x-input type="text" name="descricao" id="descricao" value="{{ $patrimonio?->descricao }}" with-old-value required>
        Descrição do Patrimônio
    </x-input>
    <x-select name="departamento_id" id="departamento_id" :options="$departamentos->pluck('titulo', 'id')" :selected="$patrimonio?->departamento_id" required>
        Setor
    </x-select>
    <x-select name="classificacao_id" id="classificacao_id" :options="$classificacoes->pluck('titulo', 'id')" :selected="$patrimonio?->classificacao_id" required>
        Classificação
    </x-select>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
