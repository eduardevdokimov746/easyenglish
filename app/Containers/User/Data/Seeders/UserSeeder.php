<?php

namespace App\Containers\User\Data\Seeders;

use App\Containers\User\Models\User;
use App\Containers\User\Models\Email;
use App\Containers\User\Models\UserInfo;
use App\Ship\Parents\Seeders\Seeder;

class UserSeeder extends Seeder
{
    public const LOAD_SHIP = 1;

    public function run()
    {
        $simpleUsers = User::factory()
            ->hasUserInfo()
            ->count(10)
            ->create(['role' => 'simple']);

        $studentUsers = User::factory()
            ->hasUserInfo()
            ->hasEmail(['is_confirmation' => 1])
            ->count(10)
            ->create(['role' => 'student']);

        $teacherUsers = User::factory()
            ->hasUserInfo()
            ->hasEmail(['is_confirmation' => 1])
            ->count(5)
            ->create(['role' => 'teacher']);

        $adminUsers = User::factory()
            ->hasUserInfo()
            ->hasEmail(['is_confirmation' => 1])
            ->create(['role' => 'admin']);
    }
}
