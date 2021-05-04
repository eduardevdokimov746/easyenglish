<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateZadanieAction extends Action
{
    public function run(int $zadanie_id, Request $request)
    {
        $data = $request->only(['title', 'section_id', 'type', 'description', 'is_visible', 'deadline']);

        Zadanie::where('id', $zadanie_id)->update($data);
    }
}
