<?php

namespace App\Containers\TeacherSection\Material\Actions;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Actions\Action;

class HideMaterialAction extends Action
{
    public function run(int $material_id)
    {
        Material::where('id', $material_id)->update(['is_visible' => 0]);
    }
}
