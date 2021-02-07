<?php

namespace App\Containers\Comment\Data\Factories;

use App\Containers\Comment\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 2),
            'post_id' => $this->faker->numberBetween(1, 10),
            'comment' => $this->faker->text(100)
        ];
    }
}
