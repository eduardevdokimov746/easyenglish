<?php

namespace App\Containers\TeacherSection\Section\Actions;

use App\Containers\TeacherSection\Section\Models\Link;
use App\Ship\Parents\Actions\Action;

class DeleteLinkAction extends Action
{
    public function run($data)
    {
        Link::where('id', $data['id'])->delete();
    }
}
