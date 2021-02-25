<?php

namespace App\Containers\Zadanie\Tasks;

use App\Containers\Zadanie\Data\Repositories\ZadanieRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteZadanieTask extends Task
{

    protected $repository;

    public function __construct(ZadanieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
