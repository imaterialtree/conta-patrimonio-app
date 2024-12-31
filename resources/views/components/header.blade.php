<!-- resources/views/components/header.blade.php -->
<div class="bg-white p-3 shadow-sm d-flex justify-content-between align-items-center sticky-top">
    <h1 class="h5 mb-0">Inventariado</h1>
    <div class="d-flex align-items-center">
        <i class="bi bi-person-circle fs-4 me-2"></i>
        @auth
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
        @endauth
    </div>
</div>
