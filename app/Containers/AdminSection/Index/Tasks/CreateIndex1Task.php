<?php

namespace App\Containers\Index1\Tasks;

use App\Containers\Index1\Data\Repositories\Index1Repository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateIndex1Task extends Task
{

    protected $repository;

    public function __construct(Index1Repository $repository)
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
