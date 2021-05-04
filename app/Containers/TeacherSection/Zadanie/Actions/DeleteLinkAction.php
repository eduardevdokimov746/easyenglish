<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Link;
use App\Ship\Parents\Actions\Action;

class DeleteLinkAction extends Action
{
    public function run($data)
    {
        Link::where('id', $data['id'])->delete();
    }
}
