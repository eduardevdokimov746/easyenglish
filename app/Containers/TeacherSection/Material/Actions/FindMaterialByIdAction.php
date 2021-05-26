<?php

namespace App\Containers\TeacherSection\Material\Actions;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Actions\Action;

class FindMaterialByIdAction extends Action
{
    public function run($id)
    {
        return Material::find($id);
    }
}
