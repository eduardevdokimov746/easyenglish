<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\Auth\UI\WEB\Requests\RegisterRequest;
use Illuminate\Http\Response;
use App\Containers\Auth\Events\UserRegisteredEvent;

class RegisterController extends WebController
{
    public function showRegistrationForm()
    {
        return view('auth::register');
    }

    public function register(RegisterRequest $request)
    {
        $user = \Apiato::call('User@CreateUserAction', [$request]);

        if (is_null($user)) {
            return redirect()->route('web_show_registration_form')->withErrors([__('ship::validation.error-server')]);
        }

        \Auth::login($user, false);

        event(new UserRegisteredEvent($user));

        $this->registered($user);

        return $request->wantsJson()
            ? new Response('', 201)
            : redirect($this->redirectPath());
    }

    protected function redirectPath(): string
    {
        return route('index');
    }

    protected function registered($user)
    {
        \Log::driver('register_users')->info('Новый пользователь зарегистрирован', [
            'id' => $user->id,
            'login' => $user->login,
            'email' => $user->email->email,
        ]);
    }
}
