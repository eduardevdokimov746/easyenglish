<?php

namespace App\Containers\ResponseTeacher\Tasks;

use App\Containers\ResponseTeacher\Data\Repositories\ResponseTeacherRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllResponseTeachersTask extends Task
{

    protected $repository;

    public function __construct(ResponseTeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
