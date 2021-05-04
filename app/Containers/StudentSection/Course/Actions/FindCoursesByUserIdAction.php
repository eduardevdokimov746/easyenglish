<?php

namespace App\Containers\StudentSection\Course\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;

class FindCoursesByUserIdAction extends Action
{
    public function run($user_id)
    {
        $user = User::where('id', $user_id)
            ->with([
                    'group.courses' => function ($query) {
                        $query->with('teacher')->where('is_visible', 1);
                    },
                    'group.courses.zadanies' => function ($query) {
                        $query->doesntHave('responseStudents');
                    }
            ])->first();

        $courses = $user?->group?->first()?->courses;

        return $courses;
    }
}
