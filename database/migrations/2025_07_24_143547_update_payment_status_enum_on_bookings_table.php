<?php

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
        Schema::table('bookings', function (Blueprint $table) {
            // For MySQL: change ENUM values for payment_status
            $table->enum('payment_status', ['VNPay', 'COD'])->default('VNPay')->change();
            // For MySQL: change ENUM values for status (remove 'confirmed')
            $table->enum('status', ['pending', 'cancelled', 'completed'])->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Revert to previous ENUM values for payment_status
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending')->change();
            // Revert to previous ENUM values for status (add 'confirmed' back)
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending')->change();
        });
    }
};
