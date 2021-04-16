@extends('layouts.app')

@section('topnav')
    <nav class="navbar navbar-expand-md navbar-light">
        <div class="topnav collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <div>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
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
                <div class="right_topnav">
                    <a id="navbarDropdown" href="#" >
                        {{ Auth::user()->username }}
                    </a>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            @endguest
        </div>
    </nav>
@endsection

@section('sidenav')
    <nav class="sidenav ">
        <a  onclick="getSegment('personnel')" id="personnel">Personnel</a>
        <a  onclick="getSegment('logs')" id="logs">Logs</a>
        <a  onclick="getSegment('departments')" id="departments">Departments</a>
        <a  onclick="getSegment('shifts')" id="shifts">Shifts</a>
        <a  onclick="getSegment('dailyAttendance')" id="dailyAttendance">Daily Attendance</a>
        <a  onclick="getSegment('monthlyAttendance')" id="monthlyAttendance">Monthly Attendance</a>
    </nav>
@endsection

@section('searchBar')
    <div id="table-container"></div>
@endsection

@section('alets')
<div id="alertSuccess" class="none alert alert-success" role="alert"></div>
<div id="alertDanger" class="none alert alert-danger" role="alert"></div>
@endsection
