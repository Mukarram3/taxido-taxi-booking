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
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('profession')->nullable();
            $table->date('birthDate')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->boolean('emailVerified')->default(false);
            $table->boolean('phoneVerified')->default(false);
            $table->string('experience')->nullable();
            $table->json('transports')->nullable();   // store multiple transports as JSON
            $table->string('travelFrequency')->nullable();
            $table->text('destinations')->nullable();
            $table->string('photo')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->text('birth_certificate')->nullable();
            $table->text('registeration_certificate')->nullable();
            $table->text('driving_license')->nullable();
            $table->text('national_id')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('vehicle_name')->nullable();
            $table->string('registeration_date')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('vehicle_color')->nullable();
            $table->text('vehicle_pictures')->nullable();
            $table->integer('means_of_transport')->nullable();
            $table->string('max_seats')->nullable();
            $table->string('rules')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('holder_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('branch_name')->nullable();
            $table->string('ifsc_code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('available_balance')->default('0');
            $table->string('total_balance')->default('0');
            $table->rememberToken();
            $table->timestamps();
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
