<?php

namespace App\Containers\Chat\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllChatsAction extends Action
{
    public function run(Request $request)
    {
        $chats = Apiato::call('Chat@GetAllChatsTask', [], ['addRequestCriteria']);

        return $chats;
    }
}
