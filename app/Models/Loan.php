<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $appends = ['instalment_list', 'intrest_amount', 'country_name', 'per_month'];

    public function getCountryNameAttribute()
    {
        $name = Country::find($this->country);
        if (!empty($name)) {
            return $name->name;
        } else {
            return 'N/A';
        }
    }


    public function getInstalmentListAttribute()
    {
        $list = InstallmentTime::whereIn('id', explode(',', $this->duration))->select('id', 'title', 'duration')->get();
        if (!empty($list)) {
            return $list;
        } else {
            return '';
        }
    }

    public function getIntrestAmountAttribute()
    {
        $amount = ($this->amount_range * $this->interest_rate) / 100;
        if (!empty($amount)) {
            return $amount;
        } else {
            return '';
        }
    }

    public function getPerMonthAttribute()
    {
        $list = InstallmentTime::where('id', $this->duration)->select('id', 'title', 'duration')->first();
        if (!empty($list)) {
            $amount = ($this->amount_range * $this->interest_rate) / 100;
            $total = ($this->amount_range + $amount) / $list->duration;
            return round($total, 2);
        } else {
            return '';
        }
    }
}
