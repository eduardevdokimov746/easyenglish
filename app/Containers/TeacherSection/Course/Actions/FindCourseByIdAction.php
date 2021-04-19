<?php

namespace App\Containers\TeacherSection\Course\Actions;

use App\Containers\TeacherSection\Course\Data\Repositories\CourseRepository;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class FindCourseByIdAction extends Action
{
    protected $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $course_id)
    {
        $course = $this->repository->getForShow($course_id);

        return $course;
    }
}
