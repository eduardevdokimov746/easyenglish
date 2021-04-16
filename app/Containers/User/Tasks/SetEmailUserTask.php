<?php

namespace App\Containers\User\Tasks;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Containers\User\Models\User;
use App\Containers\User\Models\Email;

class SetEmailUserTask extends Task
{
    public function run(User $user, Email $email)
    {
        try {
            $email = $user->email()->save($email);
            return $user = $user->setRelation('email', $email);
        } catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
