<?php

namespace App\Containers\AdminSection\Group\Actions;

use App\Containers\TeacherSection\Group\Models\Group;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;

class CreateGroupAction extends Action
{
    public function run(Request $request)
    {
        $title = $request->get('title');
        $slug = \Str::slug($title);
        $group = Group::create(['title' => $title, 'slug' => $slug]);

        if ($request->filled('students')) {
            foreach (json_decode($request->get('students'), 1) as $student) {
                $group->students()->create(['user_id' => $student['id']]);
            }
        }

    }
}
