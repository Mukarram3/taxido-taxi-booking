<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driverriderequest extends Model
{
    protected $table = 'driverriderequests';

    protected $fillable = [
        'driver_id',
        'pickup_location',
        'pickup_location_latitude',
        'pickup_location_longitude',
        'destination_location',
        'distance',
        'travel_category',
        'airline',
        'maritimes',
        'travel_company',
        'departure_datetime',
        'arrival_datetime',
        'end_reservation_date',
        'total_transport_capacity',
        'price_per_kilo',
        'price_currency',
        'available_transport_capacity',
        'collection_address',
        'delivery_address',
        'package_receiving_method',
        'excluded_packages',
        'other_excluded',
        'payment_method',
        'status',
        'message',
    ];

    protected $casts = [
        'destination_location' => 'array',
        'excluded_packages' => 'array',
        'departure_datetime' => 'datetime',
        'arrival_datetime' => 'datetime',
        'collection_address' => 'array',
        'end_reservation_date' => 'date',
        'pickup_location_latitude' => 'decimal:7',
        'pickup_location_longitude' => 'decimal:7',
    ];

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id','id');
    }
}
