<?php

namespace App\Containers\Chat\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class DeleteChatAction extends Action
{
    public function run(Request $request)
    {
        return Apiato::call('Chat@DeleteChatTask', [$request->id]);
    }
}
