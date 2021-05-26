<?php

namespace App\Containers\Material\Actions;

use App\Containers\Material\Models\MaterialUser;
use App\Ship\Parents\Actions\Action;

class DeleteFromMyAction extends Action
{
    public function run($user_id, $material_id)
    {
        MaterialUser::where(['user_id' => $user_id, 'material_id' => $material_id])->delete();
    }
}
