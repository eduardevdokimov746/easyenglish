<?php

namespace App\Containers\User1\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class UpdateUser1Action extends Action
{
    public function run(Request $request)
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        $user1 = Apiato::call('User1@UpdateUser1Task', [$request->id, $data]);

        return $user1;
    }
}
