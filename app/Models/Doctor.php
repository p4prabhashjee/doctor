<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    function get_specialist()
    {
        return $this->belongsTo('App\Models\Category', 'specialist_id');
    }
}
