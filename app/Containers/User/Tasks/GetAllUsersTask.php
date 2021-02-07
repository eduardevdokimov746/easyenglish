<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Data\Repositories\UserRepository;
use App\Containers\User\Jobs\TestJob;
use App\Containers\User\Mails\TestMail;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Mail;

class GetAllUsersTask extends Task
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        TestJob::dispatch()->onConnection('database')->onQueue('default');
    }
}
