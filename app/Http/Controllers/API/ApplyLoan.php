<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyLoan extends Model
{
    use HasFactory;

    protected $appends = ['amount_due','repayment_date','loan_name'];

    public function getAmountDueAttribute(){
        $list = ApplyLoanInstallment::where('status',1)->where('pay',1)->first();
        if (!empty($list)) {
            $carbonDate = \Carbon\Carbon::parse($list->pay_date);
            return $carbonDate->format('F');
        }else{
            return '';
        }
        
    }

    public function getRepaymentDateAttribute(){
        $list = ApplyLoanInstallment::where('status',1)->where('pay',1)->first();
        if (!empty($list)) {
            return $list->pay_date;
        }else{
            return '';
        } 
    }

    public function getLoanNameAttribute(){
        $list = Loan::find($this->loan_id);
        if (!empty($list)) {
            return $list->name;
        }else{
            return '';
        }  
    }

    function get_instalment(){
        return $this->hasMany('App\Models\ApplyLoanInstallment','apply_loan_id');
    }

    function get_user(){
        return $this->belongsTo('App\Models\User','user_id');
    }

    function get_loan(){
        return $this->belongsTo('App\Models\Loan','loan_id')->select('id','name');
    }

    function get_duration(){
        return $this->belongsTo('App\Models\InstallmentTime','duration_time');
    }

}
