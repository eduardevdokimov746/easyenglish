<?php

namespace App\Containers\User\Data\Seeders;

use App\Ship\Parents\Seeders\Seeder;
use App\Containers\User\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user1 = [
            'login' => 'edik',
            'email' => 'edik@mail.ua',
            'password' => password_hash('123', PASSWORD_DEFAULT)
        ];

        $user2 = [
            'login' => 'petya',
            'email' => 'petya@mail.ua',
            'password' => password_hash('123', PASSWORD_DEFAULT)
        ];

        User::insert([$user1, $user2]);
    }
}
