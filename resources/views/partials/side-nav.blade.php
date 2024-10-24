<div class="col-md-3 left_col">
    <div class="left_col scroll-view">

        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('home') }}" class="site_title">Conta Patrimônio</a>
        </div>

        <div class="profile"><!--img_2 -->
            <div class="profile_info">
                <span>Bem Vindo,</span>
                <h2>{{ Auth::user()->nome }}</h2>
            </div>
        </div>

        <br>
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('home') }}"><i class="fa fa-home"></i> Página Inicial </a></li>
                    <li><a href="{{ route('contagem.index') }}"><i class="fa fa-edit"></i> Contagem </a></li>
                    <li><a href="{{ route('relatorio.index') }}"><i class="fa fa-bar-chart"></i> Gerar Relatório </a></li>
                    <li><a href="{{ route('patrimonio.index') }}"><i class="fa fa-desktop"></i> Gerenciar Patrimônio </a></li>
                    <li><a href="{{ route('usuarios.index') }}"><i class="fa fa-users"></i> Gerenciar Usuários </a></li>
                </ul>
            </div>

            <div class="sidebar-footer hidden-small">
                <a data-toggle="tooltip" data-placement="top" title="Configurações">
                    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Lock">
                    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a>
                <a data-toggle="tooltip" data-placement="top" title="Logout">
                    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
</div>
