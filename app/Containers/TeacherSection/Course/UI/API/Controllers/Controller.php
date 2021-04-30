<?php

namespace App\Containers\TeacherSection\Course\UI\API\Controllers;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function show()
    {
        try {
            \Apiato::call( 'TeacherSection\Course@ShowCourseAction', [request()->get('course_id')]);
            return json_encode(['msg' => __('teachersection/course::action.course-showed')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function hide()
    {
        try {
            \Apiato::call( 'TeacherSection\Course@HideCourseAction', [request()->get('course_id')]);
            return json_encode(['msg' => __('teachersection/course::action.course-hidden')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function delete()
    {
        try {
            \Apiato::call( 'TeacherSection\Course@DeleteCourseAction', [request()->get('course_id')]);
            return json_encode(['msg' => __('teachersection/course::action.course-deleted')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function updateTitle()
    {
        try {
            $course_id = request()->get('data')['course_id'];
            $title = request()->get('data')['title'];

            Course::where('id', $course_id)->update(['title' => $title]);

            return json_encode(['msg' => __('teachersection/course::action.title-updated')]);
        } catch (\Exception) {
            return abort(500);
        }
    }
}
