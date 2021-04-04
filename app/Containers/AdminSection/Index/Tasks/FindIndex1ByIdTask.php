<?php

namespace App\Containers\Index1\Tasks;

use App\Containers\Index1\Data\Repositories\Index1Repository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindIndex1ByIdTask extends Task
{

    protected $repository;

    public function __construct(Index1Repository $repository)
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
