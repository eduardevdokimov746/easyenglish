<?php

namespace App\Containers\Group\Tasks;

use App\Containers\Group\Data\Repositories\GroupRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateGroupTask extends Task
{

    protected $repository;

    public function __construct(GroupRepository $repository)
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
