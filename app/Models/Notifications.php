<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;


    public function getCreatedAtAttribute($value){
        
        return date('h:iA,D d M Y', strtotime($value)); 
        
    }
}
