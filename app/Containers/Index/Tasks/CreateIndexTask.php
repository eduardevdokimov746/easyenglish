<?php

namespace App\Containers\Index\Tasks;

use App\Containers\Index\Data\Repositories\IndexRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateIndexTask extends Task
{

    protected $repository;

    public function __construct(IndexRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
