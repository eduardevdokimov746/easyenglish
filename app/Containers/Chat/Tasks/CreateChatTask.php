<?php

namespace App\Containers\Chat\Tasks;

use App\Containers\Chat\Data\Repositories\ChatRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateChatTask extends Task
{

    protected $repository;

    public function __construct(ChatRepository $repository)
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
