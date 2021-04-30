<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateUserAction extends Action
{
    public function run(int $user_id, Request $request)
    {
        $user = \Apiato::call('User@FindUserByIdTask', [$user_id]);

        if ($request->hasFile('users.avatar')) {
            Apiato::call('User@UpdateUserAvatarTask', [$user_id, $request->file('users.avatar'), $request->get('isDefaultAvatar')]);
        } else if ($request->get('isDefaultAvatar')) {
            Apiato::call('User@UpdateUserAvatarTask', [$user_id, null, $request->get('isDefaultAvatar')]);
        }

        Apiato::call('User@UpdateUserTask', [$user_id, $request->get('users')]);

        if ($request->filled('password')) {
            \Apiato::call('User@UpdatePasswordTask', [$user_id, $request->get('password')]);
        }

        Apiato::call('User@UpdateEmailTask', [$user_id, ['email' => $request->get('email')]]);
        Apiato::call('User@UpdateUserInfoTask', [$user_id, $request->get('users_info')]);

        if ($user->role == 'student' && $request->get('users')['role'] !== 'student') {
            Apiato::call('AdminSection\Group@DeleteGroupTask', [$user_id]);
        }

        if ($request->filled('group') && $user->group->first()?->slug !== $request->get('group')) {
            $group = \Apiato::call('AdminSection\Group@GetGroupBySlugTask', [$request->get('group')]);

            \Apiato::call('AdminSection\User@UpdateUserGroupTask', [$user_id, $group->id]);
        }

        if (\Auth::id() == $user->id) {
            \Auth::updateDataUser();
        }
    }
}
