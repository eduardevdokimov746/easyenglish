<?php

namespace App\Containers\Index\Tasks;

use App\Containers\Index\Data\Repositories\IndexRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllIndicesTask extends Task
{

    protected $repository;

    public function __construct(IndexRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
