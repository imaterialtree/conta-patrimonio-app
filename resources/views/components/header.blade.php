<!-- resources/views/components/header.blade.php -->
<div class="bg-white p-3 shadow-sm d-flex justify-content-between align-items-center sticky-top">
    <a class="h5 mb-0 text-decoration-none" href="/">Inventariado</a>
    <div class="d-flex align-items-center">
        @auth
            <i class="bi bi-person-circle fs-4 me-2"></i>
            {{-- Dropdown profile --}}
            <div class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->nome }}
                </a>

                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('usuarios.edit', Auth::user()) }}">
                        Perfil
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Sair
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-primary">
                <i class="bi bi-box-arrow-in-right"></i> Entrar
            </a>
        @endauth
    </div>
</div>
