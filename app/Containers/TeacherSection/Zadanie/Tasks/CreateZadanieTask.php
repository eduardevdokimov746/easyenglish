<?php

namespace App\Containers\Zadanie\Tasks;

use App\Containers\Zadanie\Data\Repositories\ZadanieRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateZadanieTask extends Task
{

    protected $repository;

    public function __construct(ZadanieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            return $this->repository->create($data);
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
