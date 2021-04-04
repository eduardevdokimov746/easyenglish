<?php

namespace App\Containers\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\Auth\UI\WEB\Requests\LoginRequest;
use Illuminate\Http\Response;

class LoginController extends WebController
{
    public function showLoginForm()
    {
        return view('auth::login');
    }

    public function login(LoginRequest $request)
    {
        if (\Auth::attempt($request->all(), $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse();
    }

    protected function sendLoginResponse(LoginRequest $request)
    {
        $request->session()->regenerate();

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->intended($this->redirectPath());
    }

    protected function redirectPath(): string
    {
        return route('index');
    }

    protected function sendFailedLoginResponse()
    {
        return redirect()
            ->route('web_show_login_form')
            ->withInput()
            ->withErrors(['data-auth-not-valid' => __('auth::validation.login-user-not-found')]);
    }

    public function logout()
    {
        \Auth::logout();

        return request()->wantsJson()
            ? new Response('', 204)
            : redirect()->route('web_login');
    }
}
