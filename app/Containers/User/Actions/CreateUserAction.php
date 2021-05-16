<?php

namespace App\Containers\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateUserAction extends Action
{
    public function run(Request $request)
    {
        try{
            $userData = $request->sanitizeInput([
                'login',
                'password',
            ]);

            $emailData = $request->sanitizeInput([
                'email'
            ]);

            if (!is_null($userDataSocial = \SocialAuthSession::getTableData('users'))) {
                $userData = array_merge($userDataSocial, $userData);
            }

            $user = \Apiato::call('User@CreateUserTask', [$userData]);
            $email = \Apiato::call('User@MakeEmailUserTask', [$emailData]);
            $user = \Apiato::call('User@SetEmailUserTask', [$user, $email]);

            if (!is_null($userInfo = \SocialAuthSession::getTableData('users_info'))) {
                $user = \Apiato::call('User@CreateUserInfoTask', [$user, $userInfo]);
            }

            $user = \Apiato::call('User@FindUserByIdTask', [$user->id]);

            return $user;
        }catch(\Exception $e){
            return null;
        }
    }
}
