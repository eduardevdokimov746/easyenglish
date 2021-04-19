<?php

namespace App\Containers\AdminSection\Auth\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use App\Containers\AdminSection\Auth\UI\WEB\Requests\LoginRequest;

class LoginController extends WebController
{
    public function showLoginForm()
    {
        return view('adminsection/auth::login');
    }

    public function login(LoginRequest $request)
    {
        if (\Auth::guard('admin')->attempt($request->all(), false)) {
            return $this->sendLoginResponse($request);
        }

        return $this->sendFailedLoginResponse();
    }

    protected function sendLoginResponse(LoginRequest $request)
    {
        $request->session()->regenerate();

        return $request->wantsJson()
            ? new \Response('', 204)
            : redirect($this->redirectPath());
    }

    protected function redirectPath(): string
    {
        return route('web_admin_index');
    }

    protected function sendFailedLoginResponse()
    {
        return redirect()
            ->route('web_admin_show_login_form')
            ->withInput()
            ->withErrors(['data-auth-not-valid' => __('auth::validation.login-user-not-found')]);
    }

    public function logout()
    {
        \Auth::logout();

        return request()->wantsJson()
            ? new Response('', 204)
            : redirect()->route('web_admin_show_login_form');
    }
}
