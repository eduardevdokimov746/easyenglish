<?php

namespace App\Containers\Index\Tasks;

use App\Containers\Index\Data\Repositories\IndexRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindIndexByIdTask extends Task
{

    protected $repository;

    public function __construct(IndexRepository $repository)
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
