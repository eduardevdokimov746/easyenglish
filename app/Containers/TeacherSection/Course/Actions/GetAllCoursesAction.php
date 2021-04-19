<?php

namespace App\Containers\TeacherSection\Course\Actions;

use App\Ship\Parents\Actions\Action;
use App\Containers\TeacherSection\Course\Data\Repositories\ListCourseRepository;

class GetAllCoursesAction extends Action
{
    protected $repository;

    public function __construct(ListCourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(int $user_id)
    {
        $courses = $this->repository->getWithSectionsAndGroupsCount($user_id);

        $courses = $courses->map(function($item){
            $item->url = route('web_teacher_courses_show', $item['id']);
            return $item;
        });

        return $courses;
    }
}
