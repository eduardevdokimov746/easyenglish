<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\Auth\UI\WEB\Requests\ForgotPasswordCodeRequest;

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

    public function sendResetLinkEmail(ForgotPasswordCodeRequest $request)
    {
        $isSendRestoreCode = \Apiato::call('Auth@SendRestorePasswordCodeAction', [$request]);

        if ($isSendRestoreCode) {
            return redirect()->route('web_show_code_form');
        }

        return back()->withErrors([__('ship::validation.error-server')]);
    }
}
