@extends('layouts.LoginLayout')

@section('content')

    <div class="loginBody">
        <h1>Login</h1>

        <form method="post" action="/login">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
