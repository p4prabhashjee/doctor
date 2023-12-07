<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $appends = ['city_name','state_name'];

    public function getCityNameAttribute(){
        $city = City::find($this->city);
        if ( !empty($city)) {
            return $city->city;
        } else {
            return 'N/A';
        }   
    }

    public function getStateNameAttribute(){
        $state = State::find($this->state);
        if ( !empty($state)) {
            return $state->name;;
        } else {
            return 'N/A';
        }   
    }

    function get_city(){
        return $this->belongsTo('App\Models\City','city');
    }

    function get_state(){
        return $this->belongsTo('App\Models\State','state');
    }
}
