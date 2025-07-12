<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomTypes>
 */
class RoomTypesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roomTypes = [
            'Standard Room',
            'Deluxe Room',
            'Suite',
            'Executive Room',
            'Presidential Suite',
            'Family Room',
            'Business Room',
            'Honeymoon Suite'
        ];

        $amenities = [
            'Wi-Fi, TV, Air Conditioning, Mini Bar',
            'Wi-Fi, TV, Air Conditioning, Mini Bar, Balcony',
            'Wi-Fi, TV, Air Conditioning, Mini Bar, Jacuzzi, Living Room',
            'Wi-Fi, TV, Air Conditioning, Mini Bar, Work Desk, Coffee Maker',
            'Wi-Fi, TV, Air Conditioning, Mini Bar, Jacuzzi, Living Room, Kitchen, Butler Service',
            'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area',
            'Wi-Fi, TV, Air Conditioning, Mini Bar, Work Desk, Meeting Table',
            'Wi-Fi, TV, Air Conditioning, Mini Bar, Jacuzzi, Romantic Decor, Champagne'
        ];

        $selectedType = $this->faker->randomElement($roomTypes);
        $selectedAmenities = $this->faker->randomElement($amenities);

        $basePrice = $this->faker->numberBetween(50, 500);
        $totalRooms = $this->faker->numberBetween(5, 20);
        $availableRooms = $this->faker->numberBetween(0, $totalRooms);

        return [
            'name' => $selectedType,
            'description' => $this->faker->paragraph(3, true),
            'amenities' => $selectedAmenities,
            'base_price' => $basePrice,
            'total_rooms' => $totalRooms,
            'available_rooms' => $availableRooms,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
