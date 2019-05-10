<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class House extends Model
{

    use Rateable;
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function images(){
        return $this->hasMany('App\Image');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
    public function booking()
    {
        return $this->hasOne('App\Booking');
    }
}
