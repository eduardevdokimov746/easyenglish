<?php

namespace App\Containers\Chat\Tasks;

use App\Containers\Chat\Data\Repositories\ChatRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteChatTask extends Task
{

    protected $repository;

    public function __construct(ChatRepository $repository)
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
