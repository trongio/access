@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection

@section('sidenav')

    <nav class="sidenav ">
        <a  onclick="getSegment('personnel')" class=" btn p-3 bg-light rounded">Personnel</a>
        <a  onclick="getSegment('logs')" class="btn  p-3 bg-light rounded">Logs</a>
        <a  onclick="getSegment('departament')" class="btn  p-3 bg-light rounded">Departament</a>
        <a  onclick="getSegment('attendance')" class="btn shadow-sm p-3 bg-light rounded">Monthly Attendance</a>
    </nav>
@endsection
