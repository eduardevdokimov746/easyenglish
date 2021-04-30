<?php

namespace App\Containers\TeacherSection\Group\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $courses = \Apiato::call('TeacherSection\Group@GetAllCoursesWithGroupsAction', [\Auth::id()]);
        $groups = \Apiato::call('TeacherSection\Group@GetAllGroupsAction');
        $activePavItem = 'groups';

        return view('teachersection/group::index', compact('courses', 'groups', 'activePavItem'));
    }

    public function update()
    {
        try {
            \Apiato::call('TeacherSection\Group@UpdateGroupAction', [request()]);
            return json_encode(['msg' => __('ship::action.data-success-updated')]);
        } catch (\Exception) {
            return abort(500);
        }
    }
}
