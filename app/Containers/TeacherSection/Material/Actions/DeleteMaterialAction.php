<?php

namespace App\Containers\TeacherSection\Material\Actions;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Actions\Action;

class DeleteMaterialAction extends Action
{
    public function run($material_id)
    {
        $material = Material::find($material_id);

        if ($material->image !== 'no-image-material.png') {
            if (\FileStorage::toMaterial()->has($material->image)) {
                \FileStorage::toMaterial()->delete($material->image);
            }
        }

        return Material::where('id', $material_id)->delete();
    }
}
