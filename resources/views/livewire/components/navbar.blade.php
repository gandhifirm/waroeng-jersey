<div>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                {{-- left : navbar --}}
                <ul class="navbar-nav me-auto">
                    {{-- home --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}" data-turbolinks-action="replace">Home</a>
                    </li>
                    {{-- home --}}

                    {{-- products --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Products
                        </a>

                        <ul class="dropdown-menu">
                            @foreach ($ligas as $liga)
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('product.league',$liga->slug) }}">{{ $liga->name }}</a>
                            </li>
                            @endforeach

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('products') }}"
                                    data-turbolinks-action="replace">All Products</a>
                            </li>
                        </ul>
                    </li>
                    {{-- products --}}
                </ul>
                {{-- left : navbar --}}

                {{-- right : navbar --}}
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" @if (Auth::user()) href="{{ route('cart') }}" @else
                            href="{{ route('login') }}" @endif>
                            <div class="position-relative">
                                <i class="fa-solid fa-cart-shopping"></i>
                                @if ($count_orders != 0)
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark">
                                    {{ $count_orders }}
                                </span>
                                @endif
                            </div>
                        </a>
                    </li>

                    {{-- authentication --}}
                    @guest
                    {{-- login --}}
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif
                    {{-- login --}}

                    {{-- register --}}
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    {{-- register --}}
                    @else
                    {{-- user info --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    {{-- user info --}}
                    @endguest
                    {{-- authentication --}}
                </ul>
                {{-- right : navbar --}}
            </div>
        </div>
    </nav>
</div>