<!-- resources/views/components/sidebar.blade.php -->
<div class="bg-white p-3 vh-100 shadow-sm fixed-top" style="width: 250px;">
    <h4 class="mb-4">Opções</h4>
    <ul class="nav flex-column">
        <li class="nav-item mb-2">
            <a href="{{ route('home') }}" class="nav-link text-dark">
                <i class="bi bi-house-door-fill me-2"></i> Página Inicial
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('contagens.index') }}" class="nav-link text-dark">
                <i class="bi bi-list-check me-2"></i> Contagem
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('relatorio.index') }}" class="nav-link text-dark">
                <i class="bi bi-file-earmark-text me-2"></i> Gerar Relatório
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('patrimonio.index') }}" class="nav-link text-dark">
                <i class="bi bi-box-seam me-2"></i> Gerenciar Patrimônio
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="{{ route('usuarios.index') }}" class="nav-link text-dark">
                <i class="bi bi-people-fill me-2"></i> Gerenciar Usuários
            </a>
        </li>
    </ul>
</div>
