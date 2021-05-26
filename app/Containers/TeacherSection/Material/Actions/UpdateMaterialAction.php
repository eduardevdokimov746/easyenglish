<?php

namespace App\Containers\TeacherSection\Material\Actions;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateMaterialAction extends Action
{
    public function run($material, Request $request)
    {
        $data = $request->sanitizeInput([
            'plain_title',
            'html_title',
            'plain_text',
            'html_text',
            'complexity',
            'is_visible'
        ]);

        $data['html_title'] = htmlspecialchars_decode($data['html_title']);
        $data['html_text'] = htmlspecialchars_decode($data['html_text']);

        if ($request->hasFile('image')) {
            if (\FileStorage::toMaterial()->has($material->image)) {
                \FileStorage::toMaterial()->delete($material->image);
            }

            $resultUploadFile = \FileStorage::toMaterial()->add($_FILES['image']['tmp_name'], $_FILES['image']['name']);

            if ($resultUploadFile !== false) {
                $data['image'] = $resultUploadFile;
            }
        }

        return Material::where('id', $material->id)->update($data);
    }
}
