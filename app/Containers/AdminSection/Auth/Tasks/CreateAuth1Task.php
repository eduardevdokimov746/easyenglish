<?php

namespace App\Containers\Auth1\Tasks;

use App\Containers\Auth1\Data\Repositories\Auth1Repository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateAuth1Task extends Task
{

    protected $repository;

    public function __construct(Auth1Repository $repository)
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
