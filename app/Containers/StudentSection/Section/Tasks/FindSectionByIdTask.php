<?php

namespace App\Containers\Section\Tasks;

use App\Containers\Section\Data\Repositories\SectionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindSectionByIdTask extends Task
{

    protected $repository;

    public function __construct(SectionRepository $repository)
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
