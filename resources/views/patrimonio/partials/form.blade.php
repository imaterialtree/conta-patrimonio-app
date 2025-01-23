@props(['action', 'method' => 'POST', 'patrimonio' => null])

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <x-input type="text" name="codigo" id="codigo" value="{{ $patrimonio?->codigo }}" with-old-value>
        Código do Patrimônio
    </x-input>
    <x-input type="text" name="descricao" id="descricao" value="{{ $patrimonio?->descricao }}" with-old-value>
        Descrição do Patrimônio
    </x-input>
    <x-input type="text" name="departamento_id" id="departamento_id" value="{{ $patrimonio?->departamento_id }}" with-old-value>
        Departamento ID
    </x-input>
    <x-input type="text" name="classificacao_id" id="classificacao_id" value="{{ $patrimonio?->classificacao_id }}" with-old-value>
        Classificação ID
    </x-input>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>