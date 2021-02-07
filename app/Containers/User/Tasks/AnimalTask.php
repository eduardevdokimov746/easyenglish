<?php

namespace App\Containers\User\Tasks;

use App\Containers\User\Interfaces\Animal;
use App\Ship\Parents\Tasks\Task;

class AnimalTask extends Task
{

    public function __construct()
    {
        // ..
    }

    public function run()
    {
        $animal = app(Animal::class);
        $animal->action();
    }
}
