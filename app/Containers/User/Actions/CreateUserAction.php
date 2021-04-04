<?php

namespace App\Containers\User\Actions;

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

            $user = \Apiato::call('User@CreateUserTask', [$userData]);
            $email = \Apiato::call('User@MakeEmailUserTask', [$emailData]);
            $user = \Apiato::call('User@SetEmailUserTask', [$user, $email]);

            return $user;
        }catch(\Exception $e){
            return null;
        }
    }
}
