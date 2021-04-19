<?php

namespace App\Containers\TeacherSection\Course\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use App\Containers\TeacherSection\Course\Models\Course;

class ListCourseRepository
{
    public function getWithSectionsAndGroupsCount(int $user_id)
    {
        return Course::select(['id', 'title', 'created_at', 'updated_at', 'is_visible'])
            ->where('user_id', $user_id)
            ->withCount(['sections'])
            ->get();
    }
}