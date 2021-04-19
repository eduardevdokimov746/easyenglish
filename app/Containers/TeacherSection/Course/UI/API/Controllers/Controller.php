<?php

namespace App\Containers\TeacherSection\Course\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function show()
    {
        $isSuccess = \Apiato::call( 'TeacherSection\Course@ShowCourseAction', [request()->get('course_id')]);

        if ($isSuccess) {
            return json_encode(['msg' => __('teachersection/course::action.course-showed')]);
        }

        return abort(500);
    }

    public function hide()
    {
        $isSuccess = \Apiato::call( 'TeacherSection\Course@HideCourseAction', [request()->get('course_id')]);

        if ($isSuccess) {
            return json_encode(['msg' => __('teachersection/course::action.course-hidden')]);
        }

        return abort(500);
    }

    public function delete()
    {
        $isSuccess = \Apiato::call( 'TeacherSection\Course@DeleteCourseAction', [request()->get('course_id')]);

        if ($isSuccess) {
            return json_encode(['msg' => __('teachersection/course::action.course-deleted')]);
        }

        return abort(500);
    }
}
