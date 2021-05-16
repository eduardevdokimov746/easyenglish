<?php

namespace App\Containers\StudentSection\Zadanie\Actions;

use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindZadanieByIdAction extends Action
{
    public function run($id)
    {
        $zadanie = Zadanie::where('id', $id)
            ->with([
                'files',
                'links',
                'responseStudents' => function ($query) {
                    $query->where('user_id', \Auth::id())->with(['responseTeacher', 'files']);
                }])->first();

        if (!is_null($zadanie->responseStudents->first())) {
            $responseStudent = $zadanie->responseStudents->first();

            if (is_null($responseStudent->responseTeacher)) {
                $zadanie->responseStatus = 'На проверке';
            } else if (!is_null($responseStudent->responseTeacher) && $responseStudent->responseTeacher->is_credited == 0) {
                $zadanie->responseStatus = 'Не зачтено';
            } else if (!is_null($responseStudent->responseTeacher) && $responseStudent->responseTeacher->is_credited == 1) {
                $zadanie->responseStatus = 'Зачтено';
            }
        } else {
            $zadanie->responseStatus = 'Ответ не отправлен';
        }

        return $zadanie;
    }
}
