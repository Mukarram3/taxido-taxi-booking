<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driverfarerequest extends Model
{
    protected $table = 'driverfarerequests';
    protected $fillable = [
        'userriderequest_id',
        'fare',
        'means_of_transport',
        'driver_id',
        'driver_location_longitude',
        'driver_location_latitude',
        'expiry',
        'status',
    ];

    public function userriderequest(){
        return $this->belongsTo(Userriderequest::class,'userriderequest_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id','id');
    }

}
