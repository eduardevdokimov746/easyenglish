<?php

namespace App\Containers\Material\Actions;

use App\Containers\Material\Models\MaterialDislikes;
use App\Ship\Parents\Actions\Action;

class DeleteDislikeAction extends Action
{
    public function run($user_id, $material_id)
    {
        MaterialDislikes::where('user_id', $user_id)->where('material_id', $material_id)->delete();
    }
}
