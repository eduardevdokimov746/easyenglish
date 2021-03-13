<?php

namespace App\Containers\Auth\Tasks;

use App\Containers\Auth\Data\Repositories\AuthRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllAuthsTask extends Task
{

    protected $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
