@props(['action', 'method' => 'POST', 'departamento' => null])

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <x-input type="text" name="titulo" id="titulo" value="{{ $departamento?->titulo }}" with-old-value>
        Nome do Setor
    </x-input>
    <x-input type="text" name="codigo" id="codigo" value="{{ $departamento?->codigo }}" with-old-value>
        Codigo do Setor
    </x-input>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
