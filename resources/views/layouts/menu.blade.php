<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('inicio') }}">{{ __('idioma.Inicio') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('entrenos') }}">{{ __('idioma.Entrenos') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tarifas') }}">{{ __('idioma.Tarifas') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('idioma.Idioma') }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('idioma', 'es') }}">{{ __('idioma.Español') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('idioma', 'en') }}">{{ __('idioma.Inglés') }}</a></li>
                    </ul>
                </li>
                @if (auth()->check() && auth()->user()->rol === 'admin')
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('administracion') }}">{{ __('idioma.Administracion') }}</a>
                    </li>
                @endif
            </ul>

            <div class="d-flex align-items-center gap-3">
                @if (Auth::check())
                    <!-- Botón para el perfil -->
                    <a href="{{ route('perfil.show', auth()->user()->id) }}" class="btn btn-outline-primary d-flex align-items-center">
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                    <!-- Botón para cerrar sesión -->
                    <a class="nav-link" href="{{ route('cerrarSesion') }}">{{ __('idioma.Cerrar Sesion') }}</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}">{{ __('idioma.Iniciar Sesion') }}</a>
                    <a class="nav-link" href="{{ route('register') }}">{{ __('idioma.Registrar') }}</a>
                @endif
            </div>
        </div>
    </div>
</nav>
