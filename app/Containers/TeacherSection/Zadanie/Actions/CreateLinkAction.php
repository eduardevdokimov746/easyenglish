<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;

class CreateLinkAction extends Action
{
    public function run($zadanie_id, $data)
    {
        try{
            $data['url'] = $data['type'] . $data['url'];

            $link = Zadanie::where('id', $zadanie_id)->first()->links()->create($data);

            return $link;
        }catch (\Exception $e){
            return false;
        }
    }
}
