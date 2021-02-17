<?php

namespace App\Containers\Practice\Tasks;

use App\Containers\Practice\Data\Repositories\PracticeRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllPracticesTask extends Task
{

    protected $repository;

    public function __construct(PracticeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
