<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function test() {
        return $this->belongsTo('App\Test');
    }
    public function grade() {
        return $this-> hasOne('App\Grade');
    }
    
    public function uploaddoers() {
        return $this->hasMany('App\Uploaddoer');
    }
}
