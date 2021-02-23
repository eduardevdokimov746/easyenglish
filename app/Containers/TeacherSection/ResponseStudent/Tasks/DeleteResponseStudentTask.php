<?php

namespace App\Containers\ResponseStudent\Tasks;

use App\Containers\ResponseStudent\Data\Repositories\ResponseStudentRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteResponseStudentTask extends Task
{

    protected $repository;

    public function __construct(ResponseStudentRepository $repository)
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
