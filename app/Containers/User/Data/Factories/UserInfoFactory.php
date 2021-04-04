<?php

namespace App\Containers\User\Data\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Containers\User\Models\UserInfo;

class UserInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dateOfBirth = $this->faker->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d');

        return [
            'date_of_birth' => $dateOfBirth,
            'is_visible_date_of_birth' => $this->faker->numberBetween(0, 1),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'number_phone' => $this->faker->e164PhoneNumber,
            'is_first_login' => $this->faker->numberBetween(0, 1),
            'datetime_first_login' => function ($userInfo) {
                return $userInfo['is_first_login'] == 1
                    ? $this->faker->dateTimeBetween('-10 years', '-1 years')->format('Y-m-d h:i:s')
                    : null;
            },
            'datetime_last_login' => function ($userInfo) {
                if ($userInfo['is_first_login'] == 1) {
                    $date = \Carbon\Carbon::createFromFormat('Y-m-d h:i:s', $userInfo['datetime_first_login']);
                    $dbDate = \Carbon\Carbon::parse($date);
                    $diffYears = \Carbon\Carbon::now()->diffInYears($dbDate);
                    $diffYearsString = '-' . $diffYears . ' years';

                    return $this->faker->dateTimeBetween($diffYearsString, '-1 days')->format('Y-m-d h:i:s');
                }
                return null;
            }
        ];
    }
}
