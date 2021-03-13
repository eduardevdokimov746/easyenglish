<?php

namespace App\Containers\Auth1\Tasks;

use App\Containers\Auth1\Data\Repositories\Auth1Repository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateAuth1Task extends Task
{

    protected $repository;

    public function __construct(Auth1Repository $repository)
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
