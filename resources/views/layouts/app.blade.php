<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @auth
                            <a class="nav-item nav-link text-light" href="{{ route('logout') }}">Logout</a>
                            <a class="nav-item nav-link text-light" href="{{ route('admin') }}">Admin</a>
                        @endauth
                        @guest
                            @if (Route::has('login'))
                                <a class="nav-item nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @endif
                        @endguest
                        <a class="nav-item nav-link text-light" href="{{ route('welcome') }}">{{ __('ADD DATA') }}</a>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 bg-secondary min-vh-100">
            @yield('content')
        </main>
    </div>
</body>
</html>
