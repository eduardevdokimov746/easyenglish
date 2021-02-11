<?php

namespace App\Containers\Material\Tasks;

use App\Containers\Material\Data\Repositories\MaterialRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllMaterialsTask extends Task
{

    protected $repository;

    public function __construct(MaterialRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
