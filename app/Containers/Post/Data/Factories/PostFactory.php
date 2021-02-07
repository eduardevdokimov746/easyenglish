<?php

namespace App\Containers\Post\Data\Factories;

use App\Containers\Post\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'category_id' => $this->faker->numberBetween(1, 3),
            'title' => $this->faker->text(50),
            'body' => $this->faker->text(200)
        ];
    }
}
