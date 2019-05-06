<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //
    public function house()
    {
        return $this->belongsTo(House::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'name', 'email', 'phone', 'email',
    ];
}
