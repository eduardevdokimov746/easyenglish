<?php

namespace App\Containers\Chat\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindChatByIdAction extends Action
{
    public function run(Request $request)
    {
        $chat = Apiato::call('Chat@FindChatByIdTask', [$request->id]);

        return $chat;
    }
}
