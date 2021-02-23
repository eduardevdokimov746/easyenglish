<?php

namespace App\Containers\ResponseTeacher\Tasks;

use App\Containers\ResponseTeacher\Data\Repositories\ResponseTeacherRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindResponseTeacherByIdTask extends Task
{

    protected $repository;

    public function __construct(ResponseTeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
