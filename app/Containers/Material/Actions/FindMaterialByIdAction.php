<?php

namespace App\Containers\Material\Actions;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Actions\Action;

class FindMaterialByIdAction extends Action
{
    public function run($id)
    {
        $material = Material::where('id', $id)
            ->with(['addUsers', 'likes', 'dislikes'])
            ->withCount(['likes', 'dislikes'])
            ->first();

        $material = $this->getStatus($material);
        $material = $this->checkLikesDislikes($material);

        return $material;
    }

    protected function getStatus($material)
    {
        if (($index = $material->addUsers->pluck('user_id')->search(\Auth::id())) !== false) {
            $material->add = true;
            $material->status = $material->addUsers->get($index)->status;
        } else {
            $material->add = false;
        }

        return $material;
    }

    protected function checkLikesDislikes($material)
    {
        if ($material->likes->pluck('user_id')->search(\Auth::id()) !== false) {
            $material->pressed = 'like';
        } elseif ($material->dislikes->pluck('user_id')->search(\Auth::id()) !== false) {
            $material->pressed = 'dislike';
        } else {
            $material->pressed = '';
        }

        return $material;
    }
}
