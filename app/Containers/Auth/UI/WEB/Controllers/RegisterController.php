<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class RegisterController extends WebController
{
    public function showRegistrationForm()
    {
        return view('auth::register');
    }

    public function register()
    {

    }
}
