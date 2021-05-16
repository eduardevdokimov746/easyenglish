<?php

namespace App\Containers\TeacherSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\File;
use App\Ship\Parents\Actions\Action;

class FindFileByHashAction extends Action
{
    public function run($hash)
    {
        return File::where('hash', $hash)->first();
    }
}
