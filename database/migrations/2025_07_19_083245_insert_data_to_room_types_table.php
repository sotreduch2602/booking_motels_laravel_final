<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::table('room_types')->insert([
            [
                'name' => 'Presidential Suite',
                'description' => 'Our most luxurious accommodation featuring premium amenities and spacious living areas for an unforgettable stay.',
                'amenities' => 'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area',
                'base_price' => 205.00,
                'created_at' => '2024-11-22 21:07:29',
                'updated_at' => '2025-06-27 00:36:15'
            ],
            [
                'name' => 'Standard Room',
                'description' => 'Comfortable and affordable accommodation with all essential amenities for a pleasant stay.',
                'amenities' => 'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area',
                'base_price' => 325.00,
                'created_at' => '2024-08-21 07:28:40',
                'updated_at' => '2025-07-07 22:19:10'
            ],
            [
                'name' => 'Deluxe Room',
                'description' => 'Upgraded comfort with premium furnishings and enhanced amenities for a superior experience.',
                'amenities' => 'Wi-Fi, TV, Air Conditioning, Mini Bar',
                'base_price' => 51.00,
                'created_at' => '2025-03-28 17:52:31',
                'updated_at' => '2025-06-17 16:11:28'
            ],
            [
                'name' => 'Executive Room',
                'description' => 'Sophisticated accommodation designed for business travelers with work-friendly amenities.',
                'amenities' => 'Wi-Fi, TV, Air Conditioning, Mini Bar, Extra Bed, Play Area',
                'base_price' => 147.00,
                'created_at' => '2025-06-12 08:47:56',
                'updated_at' => '2025-06-19 19:36:20'
            ],
            [
                'name' => 'Business Room',
                'description' => 'Productivity-focused space with dedicated work areas and premium business amenities.',
                'amenities' => 'Wi-Fi, TV, Air Conditioning, Mini Bar, Work Desk, Meeting Table',
                'base_price' => 363.00,
                'created_at' => '2024-09-25 22:28:11',
                'updated_at' => '2025-06-22 23:03:46'
            ],
        ]);
    }

    public function down()
    {
        DB::table('room_types')->whereIn('name', [
            'Presidential Suite',
            'Standard Room',
            'Deluxe Room',
            'Executive Room',
            'Business Room'
        ])->delete();
    }
};
