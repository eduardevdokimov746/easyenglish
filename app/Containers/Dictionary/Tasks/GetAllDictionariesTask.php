<?php

namespace App\Containers\Dictionary\Tasks;

use App\Containers\Dictionary\Data\Repositories\DictionaryRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllDictionariesTask extends Task
{

    protected $repository;

    public function __construct(DictionaryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
