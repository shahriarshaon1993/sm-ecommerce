<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->name('male'),
            'email' => $this->faker->email,
            'phone_number' => $this->faker->phoneNumber,
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ];
    }
}
