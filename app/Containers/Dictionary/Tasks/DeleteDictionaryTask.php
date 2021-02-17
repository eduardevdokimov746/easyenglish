<?php

namespace App\Containers\Dictionary\Tasks;

use App\Containers\Dictionary\Data\Repositories\DictionaryRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteDictionaryTask extends Task
{

    protected $repository;

    public function __construct(DictionaryRepository $repository)
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
