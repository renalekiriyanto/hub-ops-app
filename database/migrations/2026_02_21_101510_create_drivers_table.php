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
        Schema::create('drivers', function (Blueprint $table) {
            $table->unsignedBigInteger('driver_id')->primary();
            $table->string('name');
            $table->string('phone_number')->unique();
            $table->enum('vehicle_type', ['4wh', '2wh'])->default('2wh');
            $table->enum('contract_type', ['dedicated', 'plus', 'mitra'])->default('dedicated');
            $table->enum('status', ['normal', 'suspended', 'terminated'])->default('normal');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
