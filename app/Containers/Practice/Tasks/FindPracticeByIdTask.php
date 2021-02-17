<?php

namespace App\Containers\Practice\Tasks;

use App\Containers\Practice\Data\Repositories\PracticeRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindPracticeByIdTask extends Task
{

    protected $repository;

    public function __construct(PracticeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
