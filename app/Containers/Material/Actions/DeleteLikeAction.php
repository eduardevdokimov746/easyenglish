<?php

namespace App\Containers\Material\Actions;

use App\Containers\Material\Models\MaterialLikes;
use App\Ship\Parents\Actions\Action;

class DeleteLikeAction extends Action
{
    public function run($user_id, $material_id)
    {
        MaterialLikes::where('user_id', $user_id)->where('material_id', $material_id)->delete();
    }
}
