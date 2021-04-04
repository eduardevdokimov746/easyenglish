<?php

namespace App\Containers\Auth\UI\Api\Controllers;

use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;

class RegisterController extends ApiController
{
    public function checkValidLogin(Request $request)
    {
        $isValidLogin = \Apiato::call('Auth@CheckUniqueLoginAction', [$request->get('login')]);

        $response = [
            'isLoginAlreadyExist' => $isValidLogin,
        ];

        return $this->json($response);
    }

    public function checkValidEmail(Request $request)
    {
        $isValidEmail = \Apiato::call('Auth@CheckUniqueEmailAction', [$request->get('email')]);

        $response = [
            'isValidEmail' => $isValidEmail,
        ];

        return $this->json($response);
    }
}
