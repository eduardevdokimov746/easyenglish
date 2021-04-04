<?php

namespace App\Containers\Auth\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;

class ForgotPasswordController extends ApiController
{
    public function checkExistEmail(Request $request)
    {
        $isNotExistEmail = \Apiato::call('Auth@CheckExistEmailAction', [$request->get('email')]);

        $response = [
            'isNotExistEmail' => $isNotExistEmail,
        ];

        return $this->json($response);
    }
}
