<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userriderequest extends Model
{
    protected $table = 'userriderequests';
    protected $fillable = [
        'reference_id',
        'user_id',

        // Receiver info
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'recipient_delivery_instructions',

        // Pickup & destination
        'pickup_location',
        'pickup_zip_code',
        'pickup_house_no',
        'pickup_additional_info',
        'destination_location',
        'destination_zip_code',
        'destination_house_no',
        'destination_additional_info',
        'pickup_location_latitude',
        'pickup_location_longitude',

        // Dates
        'pickup_date',
        'delivery_date',
        'preferred_time_slot',
        'departure_date',
        'arrival_date',
        'expiry',

        // Shipment & fare
        'transport_title',
        'fare',
        'fare_currency',
        'total_declared_value',
        'shipment_description',
        'payment_method',
        'card_holdername',
        'invoice_email',
        'distance',

        // Packages
        'packages_json',
        'type_of_package',
        'sub_type_of_package',
        'quantity_of_package',
        'comments',
        'means_of_transport',
        'parcel_pictures',

        // Services & insurance
        'services',
        'insurance',
        'vehicle_type_needed',

        // Flags & status
        'is_targetted',
        'targetted_driver_id',
        'is_urgent',
        'is_professional',
        'is_personal',
        'is_homePickup',
        'is_homeDelivery',
        'is_needHelp',
        'status',
        'message',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function packagetype()
    {
        return$this->belongsTo(ParcelCategory::class,'type_of_package','id');
    }

    public function packagesubtype()
    {
        return$this->belongsTo(ParcelSubCategory::class,'sub_type_of_package','id');
    }
}
