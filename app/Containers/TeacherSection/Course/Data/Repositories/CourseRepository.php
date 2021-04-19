<?php

namespace App\Containers\TeacherSection\Course\Data\Repositories;

use App\Containers\TeacherSection\Course\Models\Course;

class CourseRepository
{
    public function getForShow(int $course_id)
    {
        return Course::select([
            'id',
            'title',
            'characteristic',
            'little_description',
            'target',
            'list_literature',
            'is_visible',
            'created_at',
            'updated_at'])
            ->where('id', $course_id)
            ->with([
                'sections:id,course_id,title,description,is_visible',
                'sections.files',
                'sections.links',
                'sections.zadanies'
            ])->first();
    }
}
