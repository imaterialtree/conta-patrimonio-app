<div class="bg-white p-3 vh-100 shadow-sm sticky-top">
    <div class="d-flex align-items-center mb-3">
        <img src="{{ asset('logo.svg') }}" alt="Brand Logo" class="me-2" style="width: 30px; height: 30px;">
        <span class="h5 mb-0">Conta patrimônio</span>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : 'text-dark' }}">
                <i class="bi bi-house-door-fill me-2"></i> Página Inicial
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('contagens.index') }}"
                class="nav-link {{ request()->routeIs('contagens.index') ? 'active' : 'text-dark' }}">
                <i class="bi bi-ui-checks me-2"></i> Contagem
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('relatorios.index') }}"
                class="nav-link {{ request()->routeIs('relatorios.index') ? 'active' : 'text-dark' }}">
                <i class="bi bi-file-earmark-text me-2"></i> Gerar Relatório
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('patrimonios.index') }}"
                class="nav-link {{ request()->routeIs('patrimonios.index') ? 'active' : 'text-dark' }}">
                <i class="bi bi-box-seam me-2"></i> Gerenciar Patrimônio
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('usuarios.index') }}"
                class="nav-link {{ request()->routeIs('usuarios.index') ? 'active' : 'text-dark' }}">
                <i class="bi bi-people-fill me-2"></i> Gerenciar Usuários
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('departamentos.index') }}"
                class="nav-link {{ request()->routeIs('departamentos.index') ? 'active' : 'text-dark' }}">
                <i class="bi bi-building-fill me-2"></i> Departamentos
            </a>
        </li>
    </ul>
</div>
