<?php

namespace App\Containers\ResponseStudent\Tasks;

use App\Containers\ResponseStudent\Data\Repositories\ResponseStudentRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateResponseStudentTask extends Task
{

    protected $repository;

    public function __construct(ResponseStudentRepository $repository)
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
