<?php

namespace App\Containers\ResponseStudent\Tasks;

use App\Containers\ResponseStudent\Data\Repositories\ResponseStudentRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllResponseStudentsTask extends Task
{

    protected $repository;

    public function __construct(ResponseStudentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
