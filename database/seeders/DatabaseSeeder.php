<?php

namespace Database\Seeders;

use App\Models\Rooms;
use App\Models\User;
use App\Models\RoomTypes;
use App\Models\Reviews;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Rooms::factory(10)->create();
        Reviews::factory(10)->create();
    }
}
