<?php

namespace App\Containers\Teacher\Tasks;

use App\Containers\Teacher\Data\Repositories\TeacherRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllTeachersTask extends Task
{

    protected $repository;

    public function __construct(TeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
