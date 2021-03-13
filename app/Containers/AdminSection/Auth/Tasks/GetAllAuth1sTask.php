<?php

namespace App\Containers\Auth1\Tasks;

use App\Containers\Auth1\Data\Repositories\Auth1Repository;
use App\Ship\Parents\Tasks\Task;

class GetAllAuth1sTask extends Task
{

    protected $repository;

    public function __construct(Auth1Repository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
