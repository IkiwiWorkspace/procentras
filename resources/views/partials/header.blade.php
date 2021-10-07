<header>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="@if (Auth::check()) {{ route('user.home') }} @else {{ route('home') }} @endif">
                <img src="{{ asset('/storage/images/logo.svg') }}" width="110" height="80" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') || request()->is('vartotojas') ? 'active' : '' }}"
                            href="@if (Auth::check()) {{ route('user.home') }} @else {{ route('home') }} @endif">Pagrindinis</a>
                    </li>
                    <li
                        class="nav-item {{ request()->is('kontaktai') || request()->is('vartotojas/kontaktai') ? 'active' : '' }}">
                        <a class="nav-link" href="@if (Auth::check()) {{ route('user.contact') }} @else {{ route('contact') }} @endif">Kontaktai</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-hover="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Vartotojas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="border:0">
                            @if (Auth::check())
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Mano paskyra</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Atsijungti') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a class="dropdown-item" href="{{ route('register') }}">Registruotis</a>
                                <a class="dropdown-item" href="{{ route('login') }}">Prisijungti</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('krepselis') || request()->is('vartotojas/krepselis') ? 'active' : '' }}"
                            href="@if (Auth::check()) {{ route('user.cart') }} @else {{ route('cart') }} @endif">Krepšelis 
                            <span class="badge badge-secondary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
