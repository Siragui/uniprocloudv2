@include('layouts.cdn')


<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{-- {{ config('app.name', 'Laravel') }} --}}
            <img src="assets/img/logo.png" width="100" height="100" alt="Logo">
        </a>
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
