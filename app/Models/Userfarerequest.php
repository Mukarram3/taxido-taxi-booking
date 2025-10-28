<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userfarerequest extends Model
{
    protected $table = 'userfarerequests';
    protected $fillable = [
        'driverriderequest_id',
        'user_id',
        'goods_name',
        'weight_capacity',
        'length',
        'width',
        'height',
        'package_type',
        'parcel_pictures',
        'requested_fare',
        'requested_kilos',
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'driver_location_longitude',
        'driver_location_latitude',
        'expiry',
        'status',
    ];

    public function driverriderequest(){
        return $this->belongsTo(Driverriderequest::class,'driverriderequest_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
