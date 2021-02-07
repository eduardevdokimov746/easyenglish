<?php

namespace App\Containers\User\Extensions;

use App\Containers\User\Interfaces\Animal;

class Cat implements Animal
{
    public function action(): void
    {
        echo 'Кот';
    }
}
