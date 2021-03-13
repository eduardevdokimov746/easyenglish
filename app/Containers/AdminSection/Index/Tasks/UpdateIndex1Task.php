<?php

namespace App\Containers\Index1\Tasks;

use App\Containers\Index1\Data\Repositories\Index1Repository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateIndex1Task extends Task
{

    protected $repository;

    public function __construct(Index1Repository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
