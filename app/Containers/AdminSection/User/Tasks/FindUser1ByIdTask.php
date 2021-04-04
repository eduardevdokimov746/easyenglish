<?php

namespace App\Containers\User1\Tasks;

use App\Containers\User1\Data\Repositories\User1Repository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindUser1ByIdTask extends Task
{

    protected $repository;

    public function __construct(User1Repository $repository)
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
