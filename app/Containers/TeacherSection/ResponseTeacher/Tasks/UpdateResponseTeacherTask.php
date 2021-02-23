<?php

namespace App\Containers\ResponseTeacher\Tasks;

use App\Containers\ResponseTeacher\Data\Repositories\ResponseTeacherRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateResponseTeacherTask extends Task
{

    protected $repository;

    public function __construct(ResponseTeacherRepository $repository)
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
