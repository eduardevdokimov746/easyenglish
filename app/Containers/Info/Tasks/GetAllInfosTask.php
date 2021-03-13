<?php

namespace App\Containers\Info\Tasks;

use App\Containers\Info\Data\Repositories\InfoRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllInfosTask extends Task
{

    protected $repository;

    public function __construct(InfoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
