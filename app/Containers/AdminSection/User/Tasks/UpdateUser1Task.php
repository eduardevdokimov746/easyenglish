<?php

namespace App\Containers\User1\Tasks;

use App\Containers\User1\Data\Repositories\User1Repository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateUser1Task extends Task
{

    protected $repository;

    public function __construct(User1Repository $repository)
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
