<?php

namespace App\Containers\Zadanie\Tasks;

use App\Containers\Zadanie\Data\Repositories\ZadanieRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateZadanieTask extends Task
{

    protected $repository;

    public function __construct(ZadanieRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        try {
            return $this->repository->update($data, $id);
        }
        catch (Exception $exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
