<?php

namespace App\Containers\ResponseStudent\Tasks;

use App\Containers\ResponseStudent\Data\Repositories\ResponseStudentRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateResponseStudentTask extends Task
{

    protected $repository;

    public function __construct(ResponseStudentRepository $repository)
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
