<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->string('room_number', 10);
            $table->unsignedBigInteger('room_type_id')->nullable();
            $table->decimal('price_per_night', 10, 2);
            $table->integer('max_people')->default(2);
            $table->text('description')->nullable();
            $table->boolean('available')->default(1);
            $table->timestamp('created_at')->nullable()->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate()->useCurrent();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
