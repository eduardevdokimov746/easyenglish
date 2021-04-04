<?php

namespace App\Containers\User\Data\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Containers\User\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $fullName = explode(' ', $this->faker->name);
        $firstName = $fullName[0];
        $othestvo = $fullName[1];
        $lastName = $fullName[2];

        $login = $this->getLogin($firstName, $lastName, $othestvo);

        return [
            'login' => $login,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'otchestvo' => $othestvo,
            'password' => password_hash('123', PASSWORD_DEFAULT)
        ];
    }

    private function getLogin($firstName, $lastName, $othestvo): string
    {
        return \Str::slug(mb_strtolower($lastName . '-' . mb_substr($firstName, 0, 1) . mb_substr($othestvo, 0 , 1)));
    }
}
