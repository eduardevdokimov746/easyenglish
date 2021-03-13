<?php

namespace App\Containers\Index1\Tasks;

use App\Containers\Index1\Data\Repositories\Index1Repository;
use App\Ship\Parents\Tasks\Task;

class GetAllIndex1sTask extends Task
{

    protected $repository;

    public function __construct(Index1Repository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
