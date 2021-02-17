<?php

namespace App\Containers\Practice\Tasks;

use App\Containers\Practice\Data\Repositories\PracticeRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdatePracticeTask extends Task
{

    protected $repository;

    public function __construct(PracticeRepository $repository)
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
