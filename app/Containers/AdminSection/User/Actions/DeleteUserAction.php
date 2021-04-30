<?php

namespace App\Containers\AdminSection\User\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class DeleteUserAction extends Action
{
    public function run($user_id)
    {
        try{
            User::where('id', $user_id)->delete();
            return true;
        }catch (\Exception){
            return false;
        }
    }
}
