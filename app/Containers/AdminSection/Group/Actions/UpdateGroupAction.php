<?php

namespace App\Containers\AdminSection\Group\Actions;

use App\Containers\AdminSection\Group\Models\StudentGroup;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class UpdateGroupAction extends Action
{
    public function run(Request $request)
    {
        $group_id = $request->id;

        \Apiato::call('AdminSection\Group@UpdateGroupTitleTask', [$group_id, $request->get('title')]);

        if ($request->filled('students')) {
            $students = collect(json_decode($request->get('students')));

            $addStudents = $students->filter(function($item){
                return $item->action == 'add';
            });

            $deleteStudents = $students->filter(function($item){
                return $item->action == 'delete';
            });

            foreach ($addStudents as $student) {
                StudentGroup::create(['group_id' => $group_id, 'user_id' => $student->id]);
            }

            foreach ($deleteStudents as $student) {
                StudentGroup::where('group_id', $group_id)->where('user_id', $student->id)->delete();
            }
        }
    }
}
