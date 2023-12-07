<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    function get_city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
