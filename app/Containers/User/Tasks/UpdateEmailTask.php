<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\Email;
use App\Ship\Parents\Tasks\Task;

class UpdateEmailTask extends Task
{
    public function run(int $user_id, array $data)
    {
        $data['is_visible'] = isset($data['is_visible']) ? 1 : 0;

        if (Email::where('user_id', $user_id)->update($data)) {
            return true;
        }

        return false;
    }
}
