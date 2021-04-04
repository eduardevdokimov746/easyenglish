<?php

namespace App\Containers\Group\Tasks;

use App\Containers\Group\Data\Repositories\GroupRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteGroupTask extends Task
{

    protected $repository;

    public function __construct(GroupRepository $repository)
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
