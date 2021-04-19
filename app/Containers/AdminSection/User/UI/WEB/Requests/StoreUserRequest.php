<?php

namespace App\Containers\AdminSection\User\UI\WEB\Requests;

use App\Containers\User\Models\Email;
use App\Ship\Parents\Requests\Request;

class StoreUserRequest extends Request
{
    public function rules()
    {
        return [
            'users.login' => 'required|min:3|unique:users,login',
            'users.email' => [
                'bail',
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if ($value != 'localhost@mail.com') {
                        if(!is_null(Email::where('email', $value)->first())){
                            $fail(__('ship::validation.register-email-already-exist'));
                        }
                    }
                }
            ],
            'users.password' => ['required'],
            'users.role' => 'required'
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
}
