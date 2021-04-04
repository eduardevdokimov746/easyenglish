<?php

namespace App\Containers\Auth\Actions;

use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Validator;

class CheckUniqueEmailAction extends Action
{
    public function run(string $email): bool
    {
        $data = [
            'email' => $email
        ];

        $rules = [
            'email' => 'unique:email_users,email'
        ];

        $validator = Validator::make($data, $rules);

        return !$validator->fails();
    }
}
