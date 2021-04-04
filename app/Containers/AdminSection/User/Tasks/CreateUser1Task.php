<?php

namespace App\Containers\User1\Tasks;

use App\Containers\User1\Data\Repositories\User1Repository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateUser1Task extends Task
{

    protected $repository;

    public function __construct(User1Repository $repository)
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
