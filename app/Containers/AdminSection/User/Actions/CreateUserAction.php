<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateUserAction extends Action
{
    public function run(Request $request)
    {
        $user = \Apiato::call('User@CreateUserTask', [$request->get('users')]);

        $email = \Apiato::call('User@MakeEmailUserTask', [['email' => $request->get('email')]]);
        $user = \Apiato::call('User@SetEmailUserTask', [$user, $email]);

        $user = \Apiato::call('User@CreateUserInfoTask', [$user, $request->get('users_info')]);

        if ($request->get('role') == 'student' && $request->get('group') !== 'default') {
            $group = \Apiato::call('AdminSection\Group@GetGroupBySlugTask', [$request->get('group')]);

            \Apiato::call('AdminSection\User@SetUserGroupTask', [$user, $group->id]);
        }

        if ($request->hasFile('users.avatar')) {
            \Apiato::call('User@UpdateUserAvatarTask', [$user->id, $request->file('users.avatar'), $request->get('isDefaultAvatar')]);
        } else if ($request->get('isDefaultAvatar')) {
           \Apiato::call('User@UpdateUserAvatarTask', [$user->id, null, $request->get('isDefaultAvatar')]);
        }

        return $user;
    }
}
