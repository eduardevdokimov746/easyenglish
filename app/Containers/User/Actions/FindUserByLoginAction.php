<?php

namespace App\Containers\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;

class FindUserByLoginAction extends Action
{
    public function run(string $login)
    {
        try {
            return User::where('login', $login)->with(['email', 'userInfo'])->first();
        } catch (\Exception) {
            return null;
        }
    }
}
