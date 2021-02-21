<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function login(IRequest $request, Router $router)
    {
        $body = $request->getBody();
        list($success, $message) = $router->database->login($body['email'], $body['password'], $user);
        if (!$success) {
            return $router->renderView('login', [
                'errorMessage' => $message,
                'data' => $body
            ]);
        }

        $_SESSION['currentUser'] = $user;
        header('Location: /');
    }


}
