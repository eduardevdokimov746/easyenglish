<?php

namespace App\Containers\TeacherSection\Material\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function show()
    {
        try {
            \Apiato::call( 'TeacherSection\Material@ShowMaterialAction', [request()->get('material_id')]);
            return json_encode(['msg' => __('teachersection/material::action.showed')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function hide()
    {
        try {
            \Apiato::call( 'TeacherSection\Material@HideMaterialAction', [request()->get('material_id')]);
            return json_encode(['msg' => __('teachersection/material::action.hidden')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function delete()
    {
        try {
            \Apiato::call( 'TeacherSection\Material@DeleteMaterialAction', [request()->get('material_id')]);
            return json_encode(['msg' => __('teachersection/material::action.deleted')]);
        } catch (\Exception) {
            return abort(500);
        }
    }
}
