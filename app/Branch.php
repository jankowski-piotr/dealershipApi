<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
    public function vehicles()
    {
        return $this->hasMany('App\Vehicles');
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
