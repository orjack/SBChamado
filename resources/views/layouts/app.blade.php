<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>SB Ticket</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Icons -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar navbar-dark bg-secondary navbar-expand-md">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Chamados
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        @guest

                        @else
                        <ul class="navbar-nav mr-auto">
                        <li  class="nav-item"><a class="nav-link" href="{{ route('analyst') }}">{{ __('Analista') }}</a></li>
                        <li  class="nav-item"><a class="nav-link" href="{{ route('ticket') }}">{{ __('Chamados') }}</a></li>
                            <li  class="nav-item"><a class="nav-link" href="{{ route('client') }}">{{ __('Clientes') }}</a></li>
                        </ul>
                        @endguest

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left:50px;">
                                        <img src="../upload/avatar/{{ Auth::user()->avatar }}" style="width: 40px; height: 40px; position: absolute;
                                            top:1px; left: 5px; border-radius: 50%;">
                                            {{ Auth::user()->name }}
                                            <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('profile') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('profile-form').submit();">
                                            <i class="fas fa-user"></i> {{ __('Perfil') }}
                                        </a>

                                        <form id="profile-form" action="{{ route('profile') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
