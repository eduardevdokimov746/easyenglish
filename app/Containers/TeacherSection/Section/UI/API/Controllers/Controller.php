<?php

namespace App\Containers\TeacherSection\Section\UI\API\Controllers;

use App\Ship\Parents\Controllers\ApiController;

class Controller extends ApiController
{
    public function show()
    {
        $isSuccess = \Apiato::call( 'TeacherSection\Section@ShowSectionAction', [request()->get('course_id')]);

        if ($isSuccess) {
            return json_encode(['msg' => __('teachersection/section::action.section-showed')]);
        }

        return abort(500);
    }

    public function hide()
    {
        $isSuccess = \Apiato::call( 'TeacherSection\Section@HideSectionAction', [request()->get('course_id')]);

        if ($isSuccess) {
            return json_encode(['msg' => __('teachersection/section::action.section-hidden')]);
        }

        return abort(500);
    }

    public function delete()
    {
        $isSuccess = \Apiato::call( 'TeacherSection\Section@DeleteSectionAction', [request()->get('course_id')]);

        if ($isSuccess) {
            return json_encode(['msg' => __('teachersection/section::action.section-deleted')]);
        }

        return abort(500);
    }
}
