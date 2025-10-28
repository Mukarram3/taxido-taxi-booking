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
        Schema::create('ridesbookeds', function (Blueprint $table) {
            $table->id();
            $table->integer('userriderequest_id')->nullable();
            $table->string('user_id');
            $table->string('driver_id');
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_email');
            $table->string('pickup_location');
            $table->string('destination_location');
            $table->string('fare');
            $table->string('fare_currency');
            $table->timestamp('expiry');
            $table->string('departure_date')->nullable();
            $table->string('arrival_date')->nullable();
            $table->string('payment_method');
            $table->string('distance');
//            $table->string('transport_time')->nullable();
//            $table->string('travel_company');
            $table->string('type_of_package');
            $table->string('sub_type_of_package');
            $table->string('length_of_package');
            $table->string('width_of_package');
//            $table->string('volume_of_package');
            $table->string('weight_of_package');
            $table->string('quantity_of_package');
            $table->string('comments')->nullable();
            $table->string('status')->default('pending');
            $table->string('driver_lat')->nullable();
            $table->string('driver_lng')->nullable();
            $table->text('route_polyline')->nullable();
            $table->text('parcel_pictures')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ridesbookeds');
    }
};
