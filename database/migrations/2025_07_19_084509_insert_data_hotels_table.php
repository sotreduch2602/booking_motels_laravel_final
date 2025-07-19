<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('hotels')->insert([
            [
                'name' => 'Hotelier - Ha Noi',
                'stars' => 5,
                'street_address' => '123 Pho Hue',
                'city' => 'Hanoi',
                'state' => 'Hanoi',
                'postal_code' => '100000',
                'country' => 'Vietnam',
                'description' => 'A luxury hotel in the heart of Hanoi with premium amenities.',
                'amenities' => 'Free Wi-Fi, Pool, Spa, Gym, Restaurant, Bar',
                'created_at' => now()
            ],
            [
                'name' => 'Hotelier - Da Nang',
                'stars' => 4,
                'street_address' => '456 Nguyen Van Linh',
                'city' => 'Da Nang',
                'state' => 'Da Nang',
                'postal_code' => '550000',
                'country' => 'Vietnam',
                'description' => 'Modern beachfront hotel with stunning ocean views.',
                'amenities' => 'Free Wi-Fi, Pool, Gym, Airport Shuttle, Restaurant',
                'created_at' => now()
            ],
            [
                'name' => 'Hotelier - Ho Chi Minh',
                'stars' => 5,
                'street_address' => '789 Le Loi',
                'city' => 'Ho Chi Minh City',
                'state' => 'Ho Chi Minh',
                'postal_code' => '700000',
                'country' => 'Vietnam',
                'description' => 'Elegant hotel in the city center, perfect for business and leisure.',
                'amenities' => 'Free Wi-Fi, Pool, Spa, Gym, Meeting Rooms, Bar',
                'created_at' => now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('hotels')->whereIn('name', [
            'Hotelier - Ha Noi',
            'Hotelier - Da Nang',
            'Hotelier - Ho Chi Minh'
        ])->delete();
    }
};
