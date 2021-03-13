<?php

namespace App\Containers\Auth1\Tasks;

use App\Containers\Auth1\Data\Repositories\Auth1Repository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteAuth1Task extends Task
{

    protected $repository;

    public function __construct(Auth1Repository $repository)
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
