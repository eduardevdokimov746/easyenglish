<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class HideZadanieAction extends Action
{
    public function run($zadanie_id)
    {
        Zadanie::where('id', $zadanie_id)->update(['is_visible' => 0]);
    }
}
