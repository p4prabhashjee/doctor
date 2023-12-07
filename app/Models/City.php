<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    use HasFactory;

    protected $appends = ['state_data'];

    public function getStateDataAttribute(){
        $state = State::find($this->state);
        if ( $state!='') {
            return $state->name;
        } else {
            return '';
        }   
    }
}
