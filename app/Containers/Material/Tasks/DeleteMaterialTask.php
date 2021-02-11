<?php

namespace App\Containers\Material\Tasks;

use App\Containers\Material\Data\Repositories\MaterialRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteMaterialTask extends Task
{

    protected $repository;

    public function __construct(MaterialRepository $repository)
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
