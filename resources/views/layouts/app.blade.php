<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GoLocal') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'pusherKey' => config('broadcasting.connections.pusher.key')
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <?php $user = (Auth::guard('guide')) ? "guide" : "tourist"; ?>
                    <a class="navbar-brand" href="{{ route($user . '.dashboard') }}">
                        GoLocal
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(!Auth::guest())
                            <?php $user = (Auth::guard('guide')) ? "guide" : "tourist"; ?>
                            <li><a href="{{ route($user . '.dashboard') }}"> Dashboard </a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false" style="position: relative;">
                                    Bookings <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route($user . '.bookings.upcoming') }}">
                                            <i class="fa fa-btn fa-user"></i> Upcoming
                                        </a>
                                        <a href="{{ route($user . '.bookings.past') }}">
                                            <i class="fa fa-btn fa-user"></i> Past
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="{{ route($user . '.requests') }}"> Requests </a></li>
                            <li><a href="{{ route($user . '.message') }}"> Messages </a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <?php $user = (Auth::guard('guide')) ? "guide" : "tourist"; ?>
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false" style="position: relative; padding-left: 50px">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width: 32px;
                                        height: 32px; position: absolute; top:10px; left: 10px; border-radius: 50%">
                                    {{ Auth::user()->first_name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route($user . '.account') }}">
                                            <i class="fa fa-btn fa-user"></i> Account
                                        </a>
                                        <a href="{{ route($user . '.profile') }}">
                                            <i class="fa fa-btn fa-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
