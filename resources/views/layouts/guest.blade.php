<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Conta Patrimônio') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="bg-light">
    <div class="d-flex flex-column min-vh-100">
        <x-header />

        <main class="container my-4 flex-grow-1">
            @yield('content')
        </main>

        <footer class="bg-white text-center py-3">
            <p class="mb-0">Conta Patrimônio &copy; {{ date('Y') }}</p>
        </footer>
    </div>

    @stack('scripts')
</body>

</html>
