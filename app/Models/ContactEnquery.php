<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactEnquery extends Model
{
    use HasFactory;

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getPhoneAttribute($value){
        $parts = explode(' ', $value);
        if (count($parts) > 1) {
            return $value;
        }else{
            return '+91 '.$value;
        }
    }
}
