<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Containers\Auth\Factories\SocialFactory;
use App\Ship\Parents\Controllers\WebController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialController extends WebController
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $isSocialAuth = \Apiato::call('Auth@SocialAuthAction', [$provider]);

        if ($isSocialAuth) {
            return redirect()->route('web_register');
        }

        return redirect()->route('web_register')->withErrors(['Не удалось получить данные сервиса. Попробуйте позже.']);
    }
}
