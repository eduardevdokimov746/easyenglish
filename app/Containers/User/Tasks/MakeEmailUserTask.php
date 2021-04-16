<?php

namespace App\Containers\User\Tasks;

use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use App\Containers\User\Models\Email;

class MakeEmailUserTask extends Task
{
    public function run(array $data)
    {
        try {
            if (\SocialAuthSession::hasSession()) {
                $data['is_confirmation'] = 1;
                $data['confirmation_code'] = null;
            } else {
                $data['is_confirmation'] = 0;
                $data['confirmation_code'] = md5(rand(1111, 9999));
            }

            return Email::make($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
