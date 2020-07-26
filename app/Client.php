<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends User
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('role', function (Client $client) {
            $client->where('role', 'client');
        });
    }
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
