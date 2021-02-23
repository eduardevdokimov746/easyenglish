<?php

namespace App\Containers\Material\Tasks;

use App\Containers\Material\Data\Repositories\MaterialRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateMaterialTask extends Task
{

    protected $repository;

    public function __construct(MaterialRepository $repository)
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
