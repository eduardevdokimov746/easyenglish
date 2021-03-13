<?php

namespace App\Containers\Info\Tasks;

use App\Containers\Info\Data\Repositories\InfoRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteInfoTask extends Task
{

    protected $repository;

    public function __construct(InfoRepository $repository)
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
