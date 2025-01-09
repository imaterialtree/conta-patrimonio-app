<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $titulo ?? 'Comitê de Contagem' }}</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        /* Ajustes específicos para mobile */
        body {
            padding-bottom: 60px;
            /* Espaço para a navbar fixa */
        }

        header {
            background: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }

        .navbar-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fff;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 60px;
        }

        .navbar-bottom a {
            text-align: center;
            color: #555;
            text-decoration: none;
        }

        .navbar-bottom a.active {
            color: #007bff;
        }

        .navbar-bottom i {
            font-size: 20px;
        }

        .navbar-bottom p {
            font-size: 12px;
            margin: 0;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center">
        @if ($voltar ?? false)
            <button onclick="history.back()" class="btn btn-light">
                <i class="bi bi-arrow-left"></i>
            </button>
        @else
            <div></div>
        @endif
        <h5 class="m-0">@yield('title', 'Inventariado')</h5>
        <div></div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="container my-3">
        @yield('content')
    </main>

    <!-- Bottom Navbar -->
    <nav class="navbar-bottom">
        <a href="{{ route('comissao.home') }}" class="{{ request()->is('comissao/home') ? 'active' : '' }}">
            <i class="bi bi-house-door"></i>
            <p>Contagem</p>
        </a>
        <a href="{{ route('comissao.perfil') }}" class="{{ request()->is('comissao/perfil') ? 'active' : '' }}">
            <i class="bi bi-person"></i>
            <p>Perfil</p>
        </a>
        <a href="{{ route('comissao.config') }}" class="{{ request()->is('comissao/config') ? 'active' : '' }}">
            <i class="bi bi-gear"></i>
            <p>Configurações</p>
        </a>
    </nav>
</body>

</html>