<?php

namespace App\Containers\Dictionary\Tasks;

use App\Containers\Dictionary\Data\Repositories\DictionaryRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateDictionaryTask extends Task
{

    protected $repository;

    public function __construct(DictionaryRepository $repository)
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
