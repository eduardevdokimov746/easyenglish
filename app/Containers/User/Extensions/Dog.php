<?php

namespace App\Containers\User\Extensions;

use App\Containers\User\Interfaces\Animal;

class Dog implements Animal
{
    public function action(): void
    {
        echo 'Собака';
    }
}
