<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Models\User;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Http\UploadedFile;

class UpdateUserAvatarTask extends Task
{
    public function run(int $user_id, UploadedFile $file = null, $isDefaultAvatar = 0)
    {
        $user = User::where('id', $user_id)->first();

        if (!$isDefaultAvatar) {
            $fileName = \PhotoStorage::updateProfileAvatarFromRequest($user->avatar, $file);
        } else {
            \PhotoStorage::setDefaultAvatar($user->avatar);
            $fileName = 'no_image_user.png';
        }

        $user->update(['avatar' => $fileName]);
        return $fileName;
    }
}
