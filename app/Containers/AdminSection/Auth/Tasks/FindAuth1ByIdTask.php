<?php

namespace App\Containers\Auth1\Tasks;

use App\Containers\Auth1\Data\Repositories\Auth1Repository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindAuth1ByIdTask extends Task
{

    protected $repository;

    public function __construct(Auth1Repository $repository)
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
