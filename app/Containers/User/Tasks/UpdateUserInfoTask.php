<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\User;
use App\Containers\User\Models\UserInfo;
use App\Ship\Parents\Tasks\Task;

class UpdateUserInfoTask extends Task
{
    public function run(int $user_id, array $data)
    {
        $data['is_visible_date_of_birth'] = isset($data['is_visible_date_of_birth']) ? 1 : 0;
        $userInfo = UserInfo::where('user_id', $user_id)->first();

        if (is_null($userInfo)) {
            if (UserInfo::create(array_merge(['user_id' => $user_id], $data))) {
                return true;
            }
        }

        if ($userInfo->update($data)) {
            return true;
        }

        return false;
    }
}
