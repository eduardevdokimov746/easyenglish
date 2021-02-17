<?php

namespace App\Containers\Zadanie\Tasks;

use App\Containers\Zadanie\Data\Repositories\ZadanieRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindZadanieByIdTask extends Task
{

    protected $repository;

    public function __construct(ZadanieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
