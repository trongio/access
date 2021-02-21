@extends('layouts.LoginLayout')

@section('content')
    <?php
    $errorMessage = $errorMessage ?? false;
    $data = $data ?? ['username' => ''];
    ?>
    <div class="container">
        <h1>Login to your account</h1>

        <form method="post" action="/login">
            <?php if ($errorMessage): ?>
            <div class="alert alert-danger">
                <p><?php echo $errorMessage ?></p>
            </div>
            <?php endif; ?>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $data['email'] ?>">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
