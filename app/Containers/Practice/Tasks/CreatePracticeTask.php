<?php

namespace App\Containers\Practice\Tasks;

use App\Containers\Practice\Data\Repositories\PracticeRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreatePracticeTask extends Task
{

    protected $repository;

    public function __construct(PracticeRepository $repository)
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
