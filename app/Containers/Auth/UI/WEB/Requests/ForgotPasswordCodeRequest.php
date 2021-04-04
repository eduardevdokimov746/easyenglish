<?php

namespace App\Containers\Auth\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class ForgotPasswordCodeRequest extends Request
{
    public function rules()
    {
        return [
            'email' => 'required|email|exists:email_users,email',
        ];
    }

    public function messages()
    {
        return \ShipLocalization::getShipValidation();
    }

    public function attributes()
    {
        return \ShipLocalization::includeFile('attributes');
    }

    public function authorize()
    {
        return true;
    }
}
