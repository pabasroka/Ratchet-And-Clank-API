<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            overflow-x: hidden;
        }
        h3 {
            color: #4b4b4b;
        }
        a, a:visited {
            color: chartreuse;
        }
        a:hover, a:active {
            color: white;
        }
        img {
            display: block;
            margin: auto;
            width: 70%;
        }
        p {
            padding: 10px;
        }
        .endpoint {
            margin-top: 30px;
        }
        .http {
            background: #4141ef;
            padding: 10px;
            border-radius: 10px;
            font-weight: bolder;
        }
        .jsonViewer {
            margin: 30px 0;
            padding: 20px;
            background: #888f96;
            border-radius: 5px;
        }
        h5 {
            margin-bottom: 20px;
        }
    </style>

</head>
<body>
<div class="container-fluid">
    <div class="row min-vh-100 flex-column flex-md-row">
        <aside class="col-12 col-md-3 col-xl-2 p-0 bg-dark">
            <nav class="navbar navbar-expand-md navbar-dark bd-dark flex-md-column flex-row align-items-center py-2 text-center sticky-top " id="sidebar">
                <button type="button" class="navbar-toggler border-0 order-1" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="text-center p-3">
                    <a href="#" class="navbar-brand mx-0 font-weight-bold text-nowrap" ><img src="{{ asset('images/logo.png') }}" alt="logo"></a>
                </div>

                <div class="collapse navbar-collapse order-last" id="nav">
                    <ul class="navbar-nav flex-column w-100 justify-content-center">
                        <li class="nav-item">
                            <a href="#information" class="nav-link"><h6>Information</h6></a>
                        </li>
                        <li class="nav-item">
                            <a href="#games" class="nav-link">🎮 Games</a>
                        </li>
                        <li class="nav-item">
                            <a href="#characters" class="nav-link">🧑 Characters</a>
                        </li>
                        <li class="nav-item">
                            <a href="#galaxies" class="nav-link">🌌 Galaxies</a>
                        </li>
                        <li class="nav-item">
                            <a href="#planets" class="nav-link">🌍 Planets</a>
                        </li>
                        <li class="nav-item">
                            <a href="#weapons" class="nav-link">🔫 Weapons</a>
                        </li>
                        <li class="nav-item">
                            <a href="#gadgets" class="nav-link">🧰 Gadgets</a>
                        </li>
                        <li class="nav-item">
                            <a href="#vehicles" class="nav-link">🚀 Vehicles</a>
                        </li>
                        <li class="nav-item">
                            <a href="#skillpoints" class="nav-link">🏆 Skill Points</a>
                        </li>
                        <li class="nav-item">
                            <a href="#organizations" class="nav-link">🏭 Organizations</a>
                        </li>
                        <li class="nav-item">
                            <a href="#races" class="nav-link">👽 Races</a>
                        </li>

                        <hr style="width: 100%; color: black; height: 1px; background-color:#2c2c2c;" />

                        <li class="nav-item">
                            <a href="{{ route('data') }}" class="nav-link"> Add data </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </aside>
        <main class="bg-secondary col-12 col-md-9 col-xl-10 p-0">
            @yield('content')
        </main>
    </div>
</div>

<script>
    console.log(url)
</script>

</body>
</html>
