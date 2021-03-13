<?php

namespace App\Containers\User1\Tasks;

use App\Containers\User1\Data\Repositories\User1Repository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteUser1Task extends Task
{

    protected $repository;

    public function __construct(User1Repository $repository)
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
