<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farerequest extends Model
{
    protected $table = 'farerequests';
    protected $fillable = [
        'request_id',
        'riderequest_id',
        'requested_fare',
        'driver_id',
        'user_id',
        'driver_location_longitude',
        'driver_location_latitude',
        'expiry',
        'status',
    ];

    public function userriderequest(){
        return $this->belongsTo(Userriderequest::class,'riderequest_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
