@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Login</h1>
    <p id="serverResponse"></p>

    <div class="form-group">
        <label for="email">Email address:</label>
        <input id="email" type="email" class="form-control "
               name="email">
    </div>

    <div class="form-group">
        <label for="password">password:</label>
        <input id="password" type="password" class="form-control "
               name="password">
    </div>

    <button id="submitbutton" name="signup-btn" type="submit" class="btn btn-primary">Submit</button>

</div>
