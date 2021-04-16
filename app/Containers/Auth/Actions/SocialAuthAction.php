<?php

namespace App\Containers\Auth\Actions;

use App\Ship\Parents\Actions\Action;

class SocialAuthAction extends Action
{
    public function run(string $provider)
    {
        try{
            \SocialAuthSession::deleteUser();

            $user = \Apiato::call('Auth@GetUserFromSocialTask', [$provider]);

            \SocialAuthSession::setUser($user);

            return true;
        }catch (\Exception) {
            return false;
        }
    }
}
