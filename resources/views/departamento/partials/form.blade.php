@props(['action', 'method' => 'POST', 'departamento'])

<form action="{{ $action }}" method="POST">
    @csrf
    @method($method)
    <x-input type="text" name="titulo" id="titulo"
        @if ($departamento) value="{{ $departamento->titulo }}" @else with-old-value @endif>
        Nome do Departamento
    </x-input>
    <x-input type="number" name="codigo" id="codigo"
        @if ($departamento) value="{{ $departamento?->codigo }}" @else with-old-value @endif>
        Codigo do Departamento
    </x-input>

    <button type="submit" class="btn btn-primary">Salvar</button>
</form>
