<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Validation rules.
     *
     * @var array
     */
    public static $validationRules = [
        'name' => 'required|max:55',
        'email' => 'email|required|unique:users',
        'password' => 'required|confirmed',
        'role' => 'required|in:admin,client,employee'
    ];

        /**
     * Accepted roles.
     *
     * @var array
     */
    public static $acceptedRoles = ['admin', 'client', 'employee'];
}
