<?php

namespace App\Containers\User\Data\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Containers\User\Models\Email;

class EmailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Email::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->email,
            'is_visible' => $this->faker->numberBetween(0, 1),
            'is_confirmation' => $this->faker->numberBetween(0, 1),
            'confirmation_code' => function ($email) {
                return $email['is_confirmation'] == 0 ? md5(mt_rand(999, 99999)) : null;
            }
        ];
    }
}
