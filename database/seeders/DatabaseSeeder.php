<?php

namespace Database\Seeders;

use Apiato\Core\Loaders\SeederLoaderTrait;
use Illuminate\Database\Seeder as LaravelSeeder;

class DatabaseSeeder extends LaravelSeeder
{
    use SeederLoaderTrait;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->runLoadingSeeders();
    }
}
