<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $appends = ['borrowed_amount','country_name','country_code1'];

    public function getCountryNameAttribute(){
        $name = Country::find($this->country_code);
        if (!empty($name)) {
            return $name->name;
        }else{
            return 'N/A';
        }    
    }

    public function getCountryCode1Attribute(){
        $name = Country::find($this->country_code);
        if (!empty($name)) {
            return '+'.$name->phonecode;
        }else{
            return 'N/A';
        }    
    }

    public function getBorrowedAmountAttribute(){
        $points = ApplyLoan::where(['user_id'=>$this->id,'status'=>2])->sum('loan_amount');
        return $points;  
    }

    function get_instalment(){
        return $this->hasMany('App\Models\ApplyLoanInstallment','apply_loan_id');
    }

    function get_country(){
        return $this->belongsTo('App\Models\Country','country_code');
    }

    

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'category',
        'collection',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
