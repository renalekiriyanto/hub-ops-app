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
        Schema::create('inbounds', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->dateTime('arrival_time');
            $table->string('slot_name');
            $table->boolean('is_additional_slot')->default(false);
            $table->integer('total_order')->default(0);
            $table->integer('total_bulky')->default(0);
            $table->integer('total_bag')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inbounds');
    }
};
