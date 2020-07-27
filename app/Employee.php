<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends User
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'users';

    /**
     * The "boot" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        // select only employees for each query
        static::addGlobalScope(function ($query) {
            $query->where('users.role', 'employee');
        });
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
