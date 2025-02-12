<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Conta Patrimônio')</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="d-flex">
        <!-- Barra Lateral -->
        <x-sidebar />

        <div class="flex-grow-1">
            <!-- Topo -->
            <x-header />

            @if (session()->has('success'))
                <x-toast type="success">
                    {{ session('success') }}
                </x-toast>
            @endif

            @include('partials.errors')

            <!-- Conteúdo Principal -->
            <main class="container my-4">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>

</html>
