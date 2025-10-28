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
        Schema::create('driverfarerequests', function (Blueprint $table) {
            $table->id();
            $table->integer('userriderequest_id');
            $table->integer('driver_id');
            $table->string('requested_fare');
            $table->string('driver_location_latitude')->nullable();
            $table->string('driver_location_longitude')->nullable();
            $table->timestamp('expiry');
            $table->string('status')->default('waiting');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driverfarerequests');
    }
};
