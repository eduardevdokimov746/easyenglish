<?php

namespace App\Containers\Index\Tasks;

use App\Containers\Index\Data\Repositories\IndexRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateIndexTask extends Task
{

    protected $repository;

    public function __construct(IndexRepository $repository)
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
