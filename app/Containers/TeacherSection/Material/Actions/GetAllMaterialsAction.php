<?php

namespace App\Containers\TeacherSection\Material\Actions;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Actions\Action;

class GetAllMaterialsAction extends Action
{
    public function run($user_id)
    {
        $materials = Material::select(['id', 'user_id', 'plain_title', 'created_at', 'updated_at', 'is_visible'])
            ->where('user_id', $user_id)
            ->withCount(['dislikes', 'likes'])
            ->get();

        return $materials;
    }
}
