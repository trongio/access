<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/8893af1676.js" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app" >
        <nav class="navbar navbar-expand-md navbar-light">
            <div>
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="topnav collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                        @guest
                            @if (Route::has('login'))

                            @endif

                            @if (Route::has('register'))

                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="#">Personal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Logs</a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                            <li class="nav-item">
                                <div class="input-group rounded">
                                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                                           aria-describedby="search-addon" />
                                    <span class="" id="search-addon">
                                <i class="fas fa-search"></i>
                              </span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link" href="#" >
                                    {{ Auth::user()->username }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @guest
            @if (Route::has('login'))

            @endif

            @if (Route::has('register'))

            @endif
        @else
         <nav class="sidenav ">
            <a  onclick="getSegment('')" class=" btn p-3 bg-light rounded">Personal</a>
            <a  onclick="getSegment('Logs')" class="btn  p-3 bg-light rounded">Logs</a>
            <a  onclick="getSegment('Departament')" class="btn  p-3 bg-light rounded">Departament</a>
            <a  onclick="getSegment('Attendance')" class="btn shadow-sm p-3 bg-light rounded">Monthly Attendance</a>
        </nav>
        @endguest
        <main id="main" class="py-4 main">
            @yield('content')
        </main>
    </div>
</body>


{{--<script>--}}

{{--        function getSegment(button) {--}}
{{--            alert('working')--}}
{{--            $.ajax({--}}
{{--                url: '/' + button,--}}
{{--                type: 'GET',--}}
{{--                success: function success(result) {--}}
{{--                    $("#main").html(result);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--</script>--}}
</html>
