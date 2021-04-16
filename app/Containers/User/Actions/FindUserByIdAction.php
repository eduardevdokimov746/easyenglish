<?php

namespace App\Containers\User\Actions;

use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindUserByIdAction extends Action
{
    public function run(int $id)
    {
        try {
            return Apiato::call('User@FindUserByIdTask', [$id]);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
