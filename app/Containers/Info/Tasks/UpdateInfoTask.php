<?php

namespace App\Containers\Info\Tasks;

use App\Containers\Info\Data\Repositories\InfoRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateInfoTask extends Task
{

    protected $repository;

    public function __construct(InfoRepository $repository)
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
