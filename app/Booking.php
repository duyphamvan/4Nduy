<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public function house(){
        return $this->belongsTo('App\House');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
