<?php

namespace App\Containers\Category\Data\Seeders;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Seeders\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['title' => 'Категория 1'],
            ['title' => 'Категория 2'],
            ['title' => 'Категория 3'],
        ];

        Category::insert($categories);
    }
}
