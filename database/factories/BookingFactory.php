<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Rooms;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition(): array
    {
        $checkIn = $this->faker->dateTimeBetween('+1 days', '+1 month');
        $checkOut = (clone $checkIn)->modify('+'.rand(1,7).' days');
        $availableRoom = Rooms::where('available', 1)->inRandomOrder()->first();
        $roomId = $availableRoom ? $availableRoom->id : (Rooms::inRandomOrder()->first()->id ?? Rooms::factory());
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'room_id' => $roomId,
            'check_in' => $checkIn->format('Y-m-d'),
            'check_out' => $checkOut->format('Y-m-d'),
            'total_price' => $this->faker->randomFloat(2, 100, 2000),
            'status' => $this->faker->randomElement(['pending', 'cancelled', 'completed']),
            'payment_status' => $this->faker->randomElement(['COD', 'VNPay']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
