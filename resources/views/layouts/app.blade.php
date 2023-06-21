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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Passions+Conflict&display=swap"
        rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css', 'resources/css/gammes.css', 'resources/css/backoffice.css'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    <img src="{{ asset('images/lelogo/lelogo_nav.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ request()->is('home') ? 'actived' : '' }}">Accueil</a>
                        <a href="{{ route('pasapas') }}"
                            class="nav-item nav-link {{ request()->is('pasapas') ? 'actived' : '' }}">Pas à pas</a>
                        <a href="{{ route('gammes.index') }}"
                            class="nav-item nav-link {{ request()->is('gammes*') ? 'actived' : '' }}">Gammes</a>
                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link {{ request()->is('contact') ? 'actived' : '' }}">Contact</a>
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
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('users.edit', $user = Auth::user()) }}">
                                        {{ __('Mon compte') }}
                                    </a>
                                    @if (Auth::user() && Auth::user()->isAdmin() )
                                        <a class="dropdown-item" href="{{ route('admin') }}">
                                            {{ __('Back-Office') }}
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Deconnexion') }}
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

        <main class="pt-4">
            <div class="container-fluid text-center">
                @if (session()->has('message'))
                    <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            @yield('content')
        </main>
    </div>

    <footer>
        <div class="row">
            <div class="col-lg-4 text-center my-auto">
                <img src="{{ asset('images/lelogo/lelogo_nav.png') }}" class=" img_logo" alt="">
                <div class="col-8 mx-auto mt-4">
                    <h5>L'Atelier 1830 est à votre écoute pour vous concoter la meilleure des pièces qui pourra vous
                        satisfaire</h5>
                </div>
            </div>
            <div class="col-lg-4 text-center my-auto">
                {{-- <div class="col-10 mx-auto mb-5">
                    <h2>Retrouvez l'Atelier 1830 sur ses réseaux sociaux</h2>
                </div> --}}
                <div class="icon_footer">
                    <a href="https://www.facebook.com/profile.php?id=100070320827389" target="_blank">
                        <img src="{{ asset('images/logos/facebook.png') }}" alt=""></a>
                    <a href="https://www.instagram.com/atelier1830/" target="_blank">
                        <img src="{{ asset('images/logos/instagram.png') }}" alt=""></a>
                    <a href="https://wa.me/330649587935" target="_blank">
                        <img src="{{ asset('images/logos/whatsapp.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-4 text-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34350.43874697801!2d2.111029110741943!3d48.80243869256719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e67db475f420bd%3A0x869e00ad0d844aba!2s78000%20Versailles!5e0!3m2!1sfr!2sfr!4v1665662199499!5m2!1sfr!2sfr"
                    width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>
        <section id="copyright">
            <div class="row text-center liens_footer">
                <div class="col-md-4 mx-auto d-flex flex-column">
                    <a>&copy; atelier-1830.com</a>
                    <div class="d-flex justify-content-around">
                        <a class="nav-link" href="{{ route('home') }}">Accueil</a>
                        <a class="nav-link">Mentions Légales</a>
                        <a class="nav-link">Contact</a>
                    </div>
                </div>
            </div>
        </section>
    </footer>



</body>

</html>
