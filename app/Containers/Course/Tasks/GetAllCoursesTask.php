<?php

namespace App\Containers\Course\Tasks;

use App\Containers\Course\Data\Repositories\CourseRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllCoursesTask extends Task
{

    protected $repository;

    public function __construct(CourseRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
