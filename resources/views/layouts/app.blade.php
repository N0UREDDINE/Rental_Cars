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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/car-listing.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <style>
        .navbar-brand img {
            height: 90px;
            width: auto;
        }
    </style>
</head>

<body>
    <div id="app" style="background-color: #000000;">
        <nav class="navbar navbar-expand-md shadow-sm"
            style="background-color: #000000; position: fixed; top: 0; left: 0; width: 100%; z-index: 9999; height: 90px;">
            <!-- Navbar content goes here -->
            <div class="container" style="font-weight:bolder; font-size:17px">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ url('storage/images/Logo.png') }}" alt="{{ config('app.name', 'Laravel') }}">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::check() && (Auth::user()->role == 'admin' || Auth::user()->role == 'user'))
                        <a class="nav-link nav-dashboard nav-link-color" id="link1"
                            href="{{ route('admindashboard') }}" style="color: #F6F1E9">
                            Dashboard
                        </a>
                        @endif
                        {{-- <a class="nav-link" href="{{ route('home') }}">
                            Home
                        </a> --}}
                        <a class="nav-link nav-home nav-link-color" id="link2" href="{{ route('home') }}"
                            style="color: #F6F1E9;">
                            Home
                        </a>
                        <a class="nav-link nav-location nav-link-color" id="link3"
                            href="{{ route('locations', 'all') }}" style="color: #F6F1E9">
                            Locations
                        </a>
                        <a class="nav-link nav-drivers nav-link-color" id="link4"
                            href="{{ route('drivers', 'all') }}" style="color: #F6F1E9">
                            Drivers
                        </a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item ">
                            <a class="nav-link nav-link-color" href="{{ route('login') }}"
                                style="color: #F6F1E9" id="link5">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link nav-link-color" href="{{ route('register') }}"
                                style="color: #F6F1E9" id="link6">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item" style="height: 0px; margin: 0 50px">
                            <a href="{{ route('viewusergarage') }}">
                                <div class="garage-icon-container">
                                    <img src="{{ asset('storage/images/Garage.png') }}" alt="garage"
                                        class="garage-icon"
                                        style="width: 100px; height: 75px;"> <!-- Adjust the width and height values as needed -->
                                    <i class="fa-solid fa-garage"></i>
                                    @if (Session::get('garage' . Auth::user()->id))
                                    @if (count(Session::get('garage' . Auth::user()->id)))
                                    <span
                                        class="garage-count">{{ count(Session::get('garage' . Auth::user()->id)) }}</span>
                                    @endif
                                    @endif
                                </div>
                            </a>
                        </li>


                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (Auth::user()->customer && Auth::user()->customer->image_path)
                            <img src="{{ Auth::user()->customer->image_path }}" width="50px"
                                style="border-radius: 50%" height="50px">
                            @else
                            {{ Auth::user()->name }}
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown"
                            style="right: 45px; top:80px; z-index: 1;">
                            <a class="dropdown-item" href="{{ route('pendings') }}">Bookings</a>
                            <a class="dropdown-item" href="{{ route('viewprofile', Auth::user()->id) }}">
                                Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
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
    <script src="{{ asset('js/nav.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous">
    </script>
    @yield('scripts')

</body>

</html>
