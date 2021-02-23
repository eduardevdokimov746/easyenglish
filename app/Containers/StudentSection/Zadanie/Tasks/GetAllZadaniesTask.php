<?php

namespace App\Containers\Zadanie\Tasks;

use App\Containers\Zadanie\Data\Repositories\ZadanieRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllZadaniesTask extends Task
{

    protected $repository;

    public function __construct(ZadanieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
