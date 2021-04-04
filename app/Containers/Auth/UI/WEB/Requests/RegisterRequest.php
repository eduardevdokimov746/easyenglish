<?php

namespace App\Containers\Auth\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class RegisterRequest extends Request
{
    public function rules()
    {
        return [
            'login' => 'required|min:3|unique:users,login',
            'email' => 'required|email|unique:email_users,email',
            'password' => [
                'required',
                'min:6',
                function ($attribute, $value, $fail) {
                    $testString = str_split($value);

                    foreach ($testString  as $currentChar) {
                        if (!is_numeric($currentChar) && $currentChar === strtoupper($currentChar)) {
                            return;
                        }
                    }
                    $fail(__('auth::validation.register-password-not-valid'));
                },
                function ($attribute, $value, $fail) {
                    $testString = str_split($value);

                    foreach ($testString  as $currentChar) {
                        if (is_numeric($currentChar)) {
                            return;
                        }
                    }
                    $fail(__('auth::validation.register-password-not-valid'));
                },
                'confirmed'
            ],
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
