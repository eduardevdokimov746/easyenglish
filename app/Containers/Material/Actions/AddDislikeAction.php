<?php

namespace App\Containers\Material\Actions;

use App\Containers\Material\Models\MaterialDislikes;
use App\Ship\Parents\Actions\Action;

class AddDislikeAction extends Action
{
    public function run($user_id, $material_id)
    {
        MaterialDislikes::create(['user_id' => $user_id, 'material_id' => $material_id]);
    }
}
