<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
    public function features()
    {
        return $this->belongsToMany('App\Feature')->withTimestamps();
    }
    public function orders()
    {
        return $this->belongsToMany('App\Order');
    }
}
