<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use Notifiable;

    protected $table = 'drivers';

    protected $fillable = [
        'name',
        'phone',
        'referral_code',
        'reffer_by',
        'email',
        'password',
        'birth_certificate',
        'registeration_certificate',
        'driving_license',
        'national_id',
        'pan_card',
        'vehicle_name',
        'registeration_date',
        'vehicle_type',
        'vehicle_color',
        'vehicle_pictures',
        'means_of_transport',
        'max_seats',
        'rules',
        'bank_name',
        'holder_name',
        'account_number',
        'branch_name',
        'ifsc_code',
        'profile',
        'latitude',
        'longitude',
        'google_id',
        'available_balance',
        'total_balance'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
