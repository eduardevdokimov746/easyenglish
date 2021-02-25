<?php

namespace App\Containers\ResponseTeacher\Tasks;

use App\Containers\ResponseTeacher\Data\Repositories\ResponseTeacherRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateResponseTeacherTask extends Task
{

    protected $repository;

    public function __construct(ResponseTeacherRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
