@extends('layouts.app')

@section('content')
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="card-title h4 mb-4">Criar novo departamento</h2>

            @include('departamento.partials.form', [
                'action' => route('departamentos.edit', $departamento),
                'method' => 'PUT',
                'departamento' => $departamento,
            ])

        </div>
    </div>
@endsection
