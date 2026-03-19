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
        Schema::create('leave_application_letters', function (Blueprint $table) {
            $table->id();
            $table->string('id_staff');
            $table->foreign('id_staff')->references('id_staff')->on('staff')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_application_letters');
    }
};
