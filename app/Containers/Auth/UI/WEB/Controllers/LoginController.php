<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class LoginController extends WebController
{
    public function showLoginForm()
    {
        return view('auth::login');
    }

    public function login()
    {

    }
}
