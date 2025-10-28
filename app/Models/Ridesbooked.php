<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ridesbooked extends Model
{
    protected $table = 'ridesbookeds';
    protected $fillable = [
        'pickup_location',
        'destination_location',
        'fare',
        'fare_currency',
        'payment_method',
        'userriderequest_id',
        'user_id',
        'receiver_name',
        'receiver_phone',
        'receiver_email',
        'driver_id',
        'expiry',
        'departure_date',
        'arrival_date',
        'distance',
//        'transport_time',
//        'travel_company',
        'type_of_package',
        'sub_type_of_package',
        'length_of_package',
        'width_of_package',
//        'volume_of_package',
        'weight_of_package',
        'quantity_of_package',
        'comments',
        'means_of_transport',
        'is_return',
        'is_user_cancelled',
        'cancelled_notes',
        'status',
        'parcel_pictures',
        'driver_lat',
        'driver_lng',
        'date_and_time_of_followup',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id','id');
    }

    public function packagetype()
    {
        return$this->belongsTo(ParcelCategory::class,'type_of_package','id');
    }

    public function packagesubtype()
    {
        return$this->belongsTo(ParcelSubCategory::class,'sub_type_of_package','id');
    }

    public function mean_of_transport()
    {
        return$this->belongsTo(Mean_of_transport::class,'means_of_transport','id');
    }

    public function vehicle_type(){
        return $this->belongsTo(Userriderequest::class,'userriderequest_id','id');
    }
}
