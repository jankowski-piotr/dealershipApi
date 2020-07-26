<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
    public function client()
    {
        return $this->belongsTo('App\Client');
    }
    public function employee()
    {
        return $this->belongsTo('App\Employee');
    }
    public function vehicles()
    {
        return $this->belongsToMany('App\Vehicle')->withTimestamps();
    }
}
