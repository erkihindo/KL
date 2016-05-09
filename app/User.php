<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function grades() {
        return $this->hasMany('App\Grade');
    }
    
    public function student() {
        return $this->hasOne('App\Student');
    }
    public function uploaddoers() {
        return $this->hasMany('App\Uploaddoer');
    }
}
