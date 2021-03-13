<?php

namespace App\Containers\Info\Tasks;

use App\Containers\Info\Data\Repositories\InfoRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateInfoTask extends Task
{

    protected $repository;

    public function __construct(InfoRepository $repository)
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
