<?php

namespace App\Containers\Chat\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateChatAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $chat = Apiato::call('Chat@CreateChatTask', [$data]);

        return $chat;
    }
}
