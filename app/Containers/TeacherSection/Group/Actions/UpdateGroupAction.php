<?php

namespace App\Containers\TeacherSection\Group\Actions;

use App\Containers\TeacherSection\Course\Models\CourseGroup;
use App\Ship\Parents\Actions\Action;

class UpdateGroupAction extends Action
{
    public function run($request)
    {
        $course_id = $request->id;

        if ($request->filled('groups')) {
            $groups = collect(json_decode($request->get('groups')));

            $addGroups = $groups->filter(function($item){
                return $item->action == 'add';
            });

            $deleteGroups = $groups->filter(function($item){
                return $item->action == 'delete';
            });

            foreach ($addGroups as $group) {
                CourseGroup::create(['course_id' => $course_id, 'group_id' => $group->id]);
            }

            foreach ($deleteGroups as $group) {
                CourseGroup::where('course_id', $course_id)->where('group_id', $group->id)->delete();
            }
        }
    }
}
