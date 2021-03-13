<?php

namespace App\Containers\Info\Tasks;

use App\Containers\Info\Data\Repositories\InfoRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindInfoByIdTask extends Task
{

    protected $repository;

    public function __construct(InfoRepository $repository)
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
