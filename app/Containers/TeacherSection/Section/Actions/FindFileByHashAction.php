<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Containers\TeacherSection\Section\Models\File;
use App\Ship\Parents\Actions\Action;

class FindFileByHashAction extends Action
{
    public function run($hash)
    {
        return File::where('hash', $hash)->first();
    }
}
