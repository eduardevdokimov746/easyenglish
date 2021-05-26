<?php

namespace App\Containers\Material\Actions;

use App\Containers\Material\Models\MaterialLikes;
use App\Ship\Parents\Actions\Action;

class AddLikeAction extends Action
{
    public function run($user_id, $material_id)
    {
        MaterialLikes::create(['user_id' => $user_id, 'material_id' => $material_id]);
    }
}
