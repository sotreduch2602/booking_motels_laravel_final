<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Hotel;
use App\Models\RoomTypes;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rooms>
 */
class RoomsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id' => Hotel::inRandomOrder()->first()->id,
            'room_type_id' => RoomTypes::inRandomOrder()->first()->id,
            'room_number' => $this->faker->unique()->numberBetween(100, 999),
            'price_per_night' => $this->faker->numberBetween(50, 500),
            'max_people' => $this->faker->numberBetween(1, 6),
            'description' => $this->faker->sentence(),
            'available' => $this->faker->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
