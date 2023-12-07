<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyLoanInstallment extends Model
{
    use HasFactory;

    public function getInstallmentAmountAttribute($value){
        
        return round($value, 2); 
        
    }

    public function getFinalAmountAttribute($value){
        
        return round($value, 2);
        
    }
}
