<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\File;
use App\Ship\Parents\Actions\Action;

class FindFileByHashAction extends Action
{
    public function run($hash)
    {
        return File::where('hash', $hash)->first();
    }
}
