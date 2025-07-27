<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE hotels ADD CONSTRAINT chk_stars CHECK (stars BETWEEN 1 AND 5)');
    }

    public function down(): void
    {
        DB::statement('ALTER TABLE hotels DROP CONSTRAINT chk_stars');
    }
};
