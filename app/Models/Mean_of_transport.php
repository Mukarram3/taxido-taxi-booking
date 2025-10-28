<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mean_of_transport extends Model
{
    protected $table = 'mean_of_transports';

    protected $fillable = ['name', 'status'];
}
