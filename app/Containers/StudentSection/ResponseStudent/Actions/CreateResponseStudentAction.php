<?php

namespace App\Containers\StudentSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class CreateResponseStudentAction extends Action
{
    public function run($zadanie_id, $data)
    {
        $response = Zadanie::where('id', $zadanie_id)->first()->responseStudents()->create($data);
        return $response;
    }
}
