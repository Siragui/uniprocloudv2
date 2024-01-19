<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'UNIPRO CLOUD LEARNING') }}</title> --}}
    <title>{{ config('UNIPRO CLOUD LEARNING', 'UNIPRO CLOUD LEARNING') }}</title>

        <!-- cdn bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/brands.min.css">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <!-- cdn bootstrap -->

               {{-- cdn font awsome --}}
               <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
               {{-- cdn font awsome --}
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    {{-- {{ config('app.name', 'UNIPRO CLOUD LEARNING') }} --}}
                    <img src="data:image/png;base64,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" width="100" height="100" alt="Logo">
                    {{-- <img src="assets/img/logo.png" width="100" height="100" alt="Logo"> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="navbar-nav me-auto"> --}}
{{-- @include('layouts.nav') --}}
<nav class="navbar navbar-expand-md navbar-light bg-white ">
    <div class="container">
        {{-- <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            {{-- <img src="assets/img/logo.png" width="100" height="100" alt="Logo">
        </a> --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">



                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Accueill </span></a>
                  </li>

                  <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/courses') }}">Cours </span></a>
                    </li>

                    <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/events') }}">Events </span></a>
                    </li>

                    <li class="nav-item active">
                      <a class="nav-link" href="{{ url('/projects') }}">Projet </span></a>
                    </li>


                    <li class="nav-item active">
                      <a class="nav-link " href="{{ url('/timetables')}}">Emplois du temps </span></a>
                    </li>

                    <li class="nav-item active">
                      <a class="nav-link " href="{{ url('/about') }}">A Propos </span></a>
                    </li>

            </ul>

        </div>
    </div>
</nav>



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __("S'inscricre") }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('profiles.index') }}" > Profile

                                    </a>

                                    @if (Auth::user()->roles == 2)
                                    <a class="dropdown-item" href="{{ route('users.index') }}" > Administration

                                    </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __("Se déconnecter") }}
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
</body>
</html>
