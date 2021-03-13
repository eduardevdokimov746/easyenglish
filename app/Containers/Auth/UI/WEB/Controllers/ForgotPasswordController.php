<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class ForgotPasswordController extends WebController
{
    public function showForgotForm()
    {
        return view('auth::password/forgot');
    }

    public function showCodeForm()
    {
        return view('auth::password/forgot-code');
    }

    public function sendResetLinkEmail()
    {

    }
}
