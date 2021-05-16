<?php

namespace App\Containers\Chat\Actions;

use App\Containers\Chat\Models\Chat;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateDialogAction extends Action
{
    public function run($user_id)
    {
        $user = \Apiato::call('User@FindUserByIdTask', [$user_id]);

        $hash = \Chat::createDialog($user);

        $chatModal = Chat::create(['type' => 'dialog', 'hash' => $hash]);

        $users = [
            [
                'user_id' => \Auth::id()
            ],
            [
                'user_id' => $user_id
            ]
        ];

        $chatModal->users()->createMany($users);

        return $hash;
    }
}
