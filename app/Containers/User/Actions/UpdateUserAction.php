<?php

namespace App\Containers\User\Actions;

use App\Containers\User\Exceptions\OldPasswordNotValidException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\User\Models\User;

class UpdateUserAction extends Action
{
    public function run(int $user_id, Request $request)
    {
        if ($request->hasFile('users.avatar')) {
            Apiato::call('User@UpdateUserAvatarTask', [$user_id, $request->file('users.avatar'), $request->get('isDefaultAvatar')]);
        } else if ($request->get('isDefaultAvatar')) {
            Apiato::call('User@UpdateUserAvatarTask', [$user_id, null, $request->get('isDefaultAvatar')]);
        }

        $user = Apiato::call('User@UpdateUserTask', [$user_id, $request->get('users')]);

        if ($request->filled(['old_password', 'password', 'password_confirmation'])) {
            if (!\Auth::checkPassword($request->get('old_password'))) {
                throw new OldPasswordNotValidException();
            } else {
                \Apiato::call('User@UpdatePasswordTask', [$user_id, $request->get('password')]);
            }
        }

        Apiato::call('User@UpdateEmailTask', [$user_id, $request->get('email_users')]);
        Apiato::call('User@UpdateUserInfoTask', [$user_id, $request->get('users_info')]);

        return $user;
    }
}
