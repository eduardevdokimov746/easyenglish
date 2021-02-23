<?php

namespace App\Containers\Section\Tasks;

use App\Containers\Section\Data\Repositories\SectionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSectionsTask extends Task
{

    protected $repository;

    public function __construct(SectionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
