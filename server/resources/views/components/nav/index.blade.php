<nav class="navbar navbar-expand-lg bg-body-tertiary navbar-customize">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ Vite::asset('resources/images/logo-removebg.png') }}" style="width: 50px;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
            aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02">
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Funcioanrios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href={{ route('services.index') }}>Serviços</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Configuração
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href={{ route('users.index', ['id' => Auth::id()]) }}>Conta</a>
                        </li>
                        <li><a class="dropdown-item" href="#">Horario de funcionamento</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href={{ route('users.logout') }}>Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
