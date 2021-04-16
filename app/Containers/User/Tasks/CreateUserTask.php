<?php

namespace App\Containers\User\Tasks;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Containers\User\Models\User;

class CreateUserTask extends Task
{
    public function run(array $data)
    {
        try {
            $data['password'] = \Hash::make($data['password']);

            return User::create($data);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
