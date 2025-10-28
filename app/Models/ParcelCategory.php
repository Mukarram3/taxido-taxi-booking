<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParcelCategory extends Model
{
    public function sub_category()
    {
        return $this->hasMany(ParcelSubCategory::class,'category_id');
    }
}
