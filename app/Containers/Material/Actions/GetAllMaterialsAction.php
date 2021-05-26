<?php

namespace App\Containers\Material\Actions;

use App\Containers\Material\Models\Material;
use App\Ship\Parents\Actions\Action;

class GetAllMaterialsAction extends Action
{
    public function run()
    {
        $query = Material::select(['id', 'user_id', 'plain_title', 'plain_text', 'complexity', 'created_at', 'updated_at', 'image'])
            ->withCount(['likes', 'dislikes'])
            ->with(['addUsers'])
            ->where('is_visible', 1);


        if (request()->filled('search')) {
            $query->where('plain_title', 'like', '%'.request()->get('search').'%');
        }

        if (request()->filled('sort')) {
            switch (request()->get('sort')) {
                case('likes'):
                    $query->orderBy('likes_count', 'desc');
                    break;
                case('dislikes'):
                    $query->orderBy('dislikes_count', 'desc');
                    break;
                case('date'):
                    $query->orderBy('updated_at', 'desc');
                    break;
            }
        }

        if (request()->filled('complexity') && request()->get('complexity') !== 'all') {
            $query->where('complexity', request()->get('complexity'));
        }

        $materials = $query->get();


        $materials = $materials->map(function($item){
            if (($index = $item->addUsers->pluck('user_id')->search(\Auth::id())) !== false) {
                $item->add = true;
                $item->status = $item->addUsers->get($index)->status;
            } else {
                $item->add = false;
            }

            $item->preview_text = \Str::limit($item->plain_text, 50);

            return $item;
        })->chunk(2);

        return $materials;
    }
}
