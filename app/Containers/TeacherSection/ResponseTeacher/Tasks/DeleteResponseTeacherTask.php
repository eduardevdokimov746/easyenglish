<?php

namespace App\Containers\ResponseTeacher\Tasks;

use App\Containers\ResponseTeacher\Data\Repositories\ResponseTeacherRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteResponseTeacherTask extends Task
{

    protected $repository;

    public function __construct(ResponseTeacherRepository $repository)
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
