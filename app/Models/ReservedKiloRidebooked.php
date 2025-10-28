<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservedKiloRidebooked extends Model
{
    protected $table = 'reserved_kilo_ridebookeds';
    protected $fillable = [
        'driverriderequest_id',
        'user_id',
        'driver_id',
        'userfarerequest_id',
        'price_per_kilo',
        'reserved_kilo',
        'totale_fare',
        'status',
        'message',
        'is_urgent',
        'is_professional',
        'is_return',
        'is_user_cancelled',
        'cancelled_notes',
        'driver_lat',
        'driver_lng',
        'route_polyline',
        'date_and_time_of_followup',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class,'driver_id','id');
    }

    public function userfarerequest(){
        return $this->belongsTo(Userfarerequest::class,'userfarerequest_id','id');
    }

    public function driverriderequest(){
        return $this->belongsTo(Driverriderequest::class,'driverriderequest_id','id');
    }
}
