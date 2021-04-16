<?php

namespace App\Containers\User\UI\WEB\Requests;

use App\Containers\User\Models\Email;
use App\Containers\User\Models\User;
use App\Ship\Parents\Requests\Request;

class UpdateUserRequest extends Request
{
    public function rules()
    {
        return [
            'users.login' => [
                'required',
                function($attribute, $value, $fail) {
                    if (\Auth::user()->login != $value) {
                        if (!is_null(User::where('login', $value)->first())) {
                            $fail(__('auth::validation.register-login-already-exist'));
                        }
                    }
                },
                'min:3'
            ],
            'email_users.email' => [
                'required',
                'email',
                function($attribute, $value, $fail) {
                    if (\Auth::user()->email->email != $value) {
                        if (!is_null(Email::where('email', $value)->first())) {
                            $fail(__('auth::validation.register-email-already-exist'));
                        }
                    }
                },
            ],
            'password' =>  [
                'nullable',
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
            'avatar' => 'mimes:jpeg,jpg,png'
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
