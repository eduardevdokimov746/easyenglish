<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Containers\Auth\UI\WEB\Requests\ConfirmEmailRequest;
use App\Ship\Parents\Controllers\WebController;
use App\Containers\Auth\Mails\ConfirmEmailMail;

class ConfirmEmailController extends WebController
{
    public function handler(ConfirmEmailRequest $request)
    {
        $isConfirmed = \Apiato::call('Auth@ConfirmEmailAction', [$request]);

        if($isConfirmed){
            session()->flash('success-notice', __('auth::actions.email-confirmed'));

            if(\Auth::guest()){
                session()->flash('notice-auth', __('auth::actions.email-confirmed'));
                return redirect()->route('web_login');
            }

            \Auth::updateDataUser();

            return redirect()->route('web_user_show', \Auth::id());
        }

        return redirect()->route('index');
    }

    public function sendDublicateMail()
    {
        $email = \Auth::user()->email->email;
        $code = \Auth::user()->email->confirmation_code;
        $link = route('web_confirm_email', [$code]);

        \Mail::to($email)->send(new ConfirmEmailMail($email, $link));

        session()->flash('info-notice', __('auth::actions.send-code-confirmation-email'));
        return back();
    }
}
