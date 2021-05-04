<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateZadanieAction extends Action
{
    public function run(Request $request)
    {
        $data = $request->only(['title', 'section_id', 'type', 'description', 'is_visible', 'deadline']);
        $data['user_id'] = \Auth::id();

        return Zadanie::create($data);
    }
}
