<?php

namespace App\Containers\Auth\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class LoginRequest extends Request
{
    public function rules()
    {
        return [
            'login' => 'required',
            'password' => 'required'
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
