<?php

namespace App\Containers\StudentSection\Course\Actions;

use App\Containers\TeacherSection\Course\Data\Repositories\CourseRepository;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TeacherSection\Course\Models\Course;

class FindCourseByIdAction extends Action
{
    public function run(int $course_id)
    {
        $course = Course::select([
            'id',
            'user_id',
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
                'sections' => function ($query) {
                    $query->where('is_visible', 1);
                },
                'sections.files',
                'sections.links',
                'sections.zadanies' => function ($query) {
                    $query->where('is_visible', 1);
                }
            ])->first();

        return $course;
    }
}
