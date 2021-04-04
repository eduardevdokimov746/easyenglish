<?php

namespace App\Containers\Auth\Actions;

use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Validator;

class CheckUniqueLoginAction extends Action
{
    public function run(string $login): bool
    {
        $data = [
            'login' => $login
        ];

        $rules = [
            'login' => 'unique:users,login'
        ];

        $validator = Validator::make($data, $rules);

        return !$validator->fails();
    }
}
