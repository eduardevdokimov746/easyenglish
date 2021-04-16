<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;

class UpdateUserTask extends Task
{
    public function run(int $user_id, array $data)
    {
        if (User::where('id', $user_id)->update($data)) {
            return true;
        }

        return false;
    }
}
