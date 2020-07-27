<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Client extends User
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
        // select only clients for each query
        static::addGlobalScope(function ($query) {
            $query->where('users.role', 'client');
        });
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
