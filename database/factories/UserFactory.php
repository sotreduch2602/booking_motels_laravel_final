<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'full_name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password_hash' => Hash::make('password'),
            'phone' => $this->faker->phoneNumber,
            'role' => 0,
            'google_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
