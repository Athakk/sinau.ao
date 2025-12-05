<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid align-items-center">
        <a class="navbar-brand me-auto" href="{{ route('home') }}">
            <img src="{{ asset('frontuser/gambar/sinau.ao.png') }}" alt="Logo Sinau.ao" height="40">
        </a>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-center flex-grow-1 pe-3 align-items-start">
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ request()->routeIs('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ request()->routeIs('subject') ? 'active' : '' }}"
                            href="{{ route('subject') }}">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ request()->routeIs('mySubject') ? 'active' : '' }}"
                            href="{{ route('mySubject') }}">Program Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-lg-2 {{ request()->routeIs('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">Tentang Kami</a>
                    </li>
                </ul>
            </div>
        </div>
        @if (Auth::user())
            <a href="{{ route('logout') }}" class="login-button">Logout</a>
        @else
            <a href="{{ route('login') }}" class="login-button">Login</a>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
