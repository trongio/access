@extends('layouts.app')

@section('topnav')
    <div class="topnav collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

            @guest
                @if (Route::has('login'))@endif

                @if (Route::has('register'))@endif
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
@endsection

@section('sidenav')
    <nav class="sidenav ">
        <a  onclick="getSegment('personnel')" class=" btn p-3 bg-light rounded">Personnel</a>
        <a  onclick="getSegment('logs')" class="btn  p-3 bg-light rounded">Logs</a>
        <a  onclick="getSegment('departments')" class="btn  p-3 bg-light rounded">Departament</a>
        <a  onclick="getSegment('attendance')" class="btn shadow-sm p-3 bg-light rounded">Monthly Attendance</a>
    </nav>
@endsection

@section('searchBar')
    <div id="table-container"></div>
@endsection
