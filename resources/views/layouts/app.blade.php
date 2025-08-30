<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @yield('styles')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand bg-light" href="{{ route('home') }}">
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="{{ config('app.name', 'Laravel') }}" class="rounded-circle" width="100">
                </a>
                <button id="theme-toggle" class="btn btn-outline-secondary">
                    <i id="theme-icon" class="bi bi-sun-fill"></i>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        function toggleTheme() {
            const body = document.body;
            const icon = document.getElementById('theme-icon');

            if (body.getAttribute('data-bs-theme') === 'dark') {
                body.setAttribute('data-bs-theme', 'light');
                icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
                localStorage.setItem('theme', 'light');
            } else {
                body.setAttribute('data-bs-theme', 'dark');
                icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
                localStorage.setItem('theme', 'dark');
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('theme-toggle');
            const savedTheme = localStorage.getItem('theme') || 'light';

            document.body.setAttribute('data-bs-theme', savedTheme);

            const icon = document.getElementById('theme-icon');
            if (savedTheme === 'dark') {
                icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
            }

            btn.addEventListener('click', toggleTheme);
        });

    </script>
    @yield('scripts')
</body>
</html>
