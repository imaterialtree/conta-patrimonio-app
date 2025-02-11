@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Importar Patrimônio</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('patrimonios.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="csv_file" class="form-label">Arquivo CSV</label>
                <input type="file" id="csv_file" name="csv_file" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Importar</button>
        </form>
    </div>
@endsection
