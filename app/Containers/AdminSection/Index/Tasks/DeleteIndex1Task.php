<?php

namespace App\Containers\Index1\Tasks;

use App\Containers\Index1\Data\Repositories\Index1Repository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteIndex1Task extends Task
{

    protected $repository;

    public function __construct(Index1Repository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
