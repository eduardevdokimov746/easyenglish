<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Link;
use App\Ship\Parents\Actions\Action;

class UpdateLinkAction extends Action
{
    public function run($id, $data)
    {
        $dataModel = collect($data)->only(['title', 'url'])->toArray();
        $dataModel['url'] = $data['type'] . $data['edit_url'];

        Link::where('id', $id)->update($dataModel);
    }
}
