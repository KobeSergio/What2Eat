<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>What2Eat</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <!-- ======= Header ======= -->
        <nav id="header" class="header  d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">
                <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-lg-0">
                    <h1>What<span>2</span>Eat</h1>
                </a>
                <div id="navbar" class="navbar">
                    <ul>
                        <li><a href="{{ url('/') }}">Browse Recipes</a></li>
                        @auth
                        <li><a href="{{ url('/recipes') }}">Your Recipes</a></li>
                        <li><a href="{{ url('/recipes/create') }}">Post a recipe</a></li>
                        @endauth
                    </ul>
                </div>
                @guest
                <div id="navbar" class="navbar">
                    <ul>
                        @if (Route::has('login'))
                        <li class="div-item">
                            <a href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="navbar"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
        </nav>
        @endguest
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
    </nav><!-- End Header -->
    <main class="mt-4">
        @yield('content')
    </main>
    </div>
</body>

</html>