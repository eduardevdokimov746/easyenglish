<?php

namespace App\Containers\TeacherSection\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateCourseAction extends Action
{
    public function run(Request $request)
    {
        try{
            $data = $request->sanitizeInput([
                'title',
                'characteristic',
                'little_description',
                'target',
                'list_literature',
            ]);

            $course = \Auth::user()->courses()->create($data);

            return $course;
        }catch (\Exception){
            return false;
        }
    }
}
