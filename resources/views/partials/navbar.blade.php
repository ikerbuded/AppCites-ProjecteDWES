<header class="navbar navbar-expand-lg bg-primary sticky-top" data-bs-theme="dark">
    <div class="container">
        <div class="logo text-white fw-bold">LoveConnect</div>

        <!-- Botó hamburguesa -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contingut del navbar -->
        <div class="collapse navbar-collapse" id="navbarColor01">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Inici</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('buscarparella.index') }}">Buscar Parella</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('missatges.index') }}">Missatges</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cites.index') }}">Cites</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img class="img-fluid rounded-circle" src="{{ asset('storage/' . Auth::user()->imatge) }}" alt="avatar" style="width: 1.5em"> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('usuari.perfil', ['name' => str_replace(' ', '_', Auth::user()->name)]) }}">
                            {{ __('Perfil') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Configuració') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Sortir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
