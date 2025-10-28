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
        Schema::create('userfarerequests', function (Blueprint $table) {
            $table->id();
            $table->integer('driverriderequest_id');
            $table->integer('user_id');

            $table->string('goods_name')->nullable(); // free text name
            $table->decimal('weight_capacity', 10, 2)->nullable();
            $table->decimal('length', 10, 2)->nullable();
            $table->decimal('width', 10, 2)->nullable();
            $table->decimal('height', 10, 2)->nullable();
            $table->enum('package_type', [
                'car', 'electronics', 'appliances', 'clothing', 'small_parcel', 'other'
            ])->nullable();

            $table->string('requested_fare');
            $table->string('requested_kilos');
            $table->string('receiver_name');
            $table->string('receiver_email');
            $table->string('receiver_phone');
            $table->string('driver_location_latitude')->nullable();
            $table->string('driver_location_longitude')->nullable();
            $table->text('parcel_pictures')->nullable();
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
        Schema::dropIfExists('userfarerequests');
    }
};
