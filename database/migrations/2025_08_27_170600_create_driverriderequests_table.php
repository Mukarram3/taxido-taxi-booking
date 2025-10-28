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
        Schema::create('driverriderequests', function (Blueprint $table) {
            $table->id();
            $table->integer('driver_id');
            $table->string('travel_company')->nullable();
            $table->enum('travel_category', ['air_travel', 'sea_travel']);
            $table->string('maritimes')->nullable();
            $table->string('airline')->nullable();
            $table->string('pickup_location');
            $table->json('destination_location');
            $table->decimal('distance', 8, 2)->nullable();
            $table->dateTime('departure_datetime');
             $table->dateTime('arrival_datetime');
            $table->integer('total_transport_capacity');
            $table->integer('available_transport_capacity');
            $table->decimal('price_per_kilo', 10, 2);
            $table->string('price_currency');
            $table->enum('package_receiving_method', ['hand', 'postal']);
            $table->date('end_reservation_date');
            $table->json('collection_address');
            $table->string('delivery_address');
            $table->json('excluded_packages')->nullable();
            $table->text('other_excluded')->nullable();
            $table->decimal('pickup_location_latitude', 10, 7)->nullable();
            $table->decimal('pickup_location_longitude', 10, 7)->nullable();
            $table->enum('payment_method', ['online'])->default('online');
            $table->string('status')->default('waiting');
            $table->string('message')->default('');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driverriderequests');
    }
};
