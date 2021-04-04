<?php

namespace App\Containers\Auth\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request;

class ConfirmEmailRequest extends Request
{
    protected $urlParameters = [
        'code'
    ];

    public function rules()
    {
        return [
            'code' => 'exists:email_users,confirmation_code'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
