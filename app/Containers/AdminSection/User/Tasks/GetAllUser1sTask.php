<?php

namespace App\Containers\User1\Tasks;

use App\Containers\User1\Data\Repositories\User1Repository;
use App\Ship\Parents\Tasks\Task;

class GetAllUser1sTask extends Task
{

    protected $repository;

    public function __construct(User1Repository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
