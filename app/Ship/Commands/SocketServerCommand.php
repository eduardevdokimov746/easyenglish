<?php

namespace App\Ship\Commands;

use App\Ship\Parents\Commands\ConsoleCommand;
use App\Ship\Parents\Socket\Chat;

class SocketServerCommand extends ConsoleCommand
{
    protected $signature = 'sock:serve';

    public function handle()
    {
        (new Chat())->run();
    }
}
