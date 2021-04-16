<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Models\User;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindUserByIdTask extends Task
{
    public function run($id)
    {
        try {
            return User::where('id', $id)->with(['email', 'userInfo'])->first();
        } catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
