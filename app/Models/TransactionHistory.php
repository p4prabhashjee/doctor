<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    use HasFactory;

    function get_user(){
        return $this->belongsTo('App\Models\User','user_id')->select('id','name');
    }
}
