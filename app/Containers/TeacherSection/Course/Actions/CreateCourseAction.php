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
                'list_literature'
            ]);

            $data['is_visible'] = $request->get('is_visible', 0);

            $course = \Auth::user()->courses()->create($data);

            return $course;
        }catch (\Exception){
            return false;
        }
    }
}
