<?php

namespace App\Containers\Auth\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;
use App\Containers\User\Models\Email;

class ForgotPasswordCodeRequest extends Request
{
    public function rules()
    {
        return [
            'email' => [
                'required',
                'email',
                'exists:email_users,email',
                function($attribute, $value, $fail){
                    if (Email::where('email', $value)->first()->is_confirmation == 0) {
                        $fail(__('auth::validation.forgot-password-email-not-found'));
                    }
                },
            ]
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
