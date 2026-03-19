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
        Schema::create('staff', function (Blueprint $table) {
            $table->string('id_staff')->primary();
            $table->string('name');
            $table->string('phone_number')->unique()->nullable();
            $table->enum('vehicle_type', ['4wh', '2wh'])->nullable();
            $table->enum('title', ['HL', 'SL', 'Admin', 'Operator', 'Driver', 'Rider'])->nullable();
            $table->enum('contract_type', ['dedicated', 'plus', 'mitra'])->nullable();
            $table->enum('status', ['normal', 'suspended', 'terminated'])->default('normal');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
