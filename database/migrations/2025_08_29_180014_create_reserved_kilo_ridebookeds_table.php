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
        Schema::create('reserved_kilo_ridebookeds', function (Blueprint $table) {
            $table->id();
            $table->integer('driverriderequest_id')->nullable();
            $table->string('user_id');
            $table->string('driver_id');
            $table->string('userfarerequest_id');
            $table->string('price_per_kilo');
            $table->string('reserved_kilo');
            $table->string('totale_fare');
            $table->string('status')->default('pending');
            $table->string('message')->nullable();
            $table->boolean('is_urgent')->default(false);
            $table->boolean('is_professional')->default(false);
            $table->boolean('is_return')->nullable();
            $table->boolean('is_user_cancelled')->nullable();
            $table->text('cancelled_notes')->nullable();
            $table->text('route_polyline')->nullable();
            $table->string('driver_lat')->nullable();
            $table->string('driver_lng')->nullable();
            $table->timestamp('date_and_time_of_followup')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserved_kilo_ridebookeds');
    }
};
