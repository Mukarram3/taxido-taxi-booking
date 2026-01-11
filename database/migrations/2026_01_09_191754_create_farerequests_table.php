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
        Schema::create('farerequests', function (Blueprint $table) {
            $table->id();
            $table->string('request_id');
            $table->integer('riderequest_id');
            $table->integer('driver_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('farerequests');
    }
};
