<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uploaddoer extends Model
{
    public function upload() {
        return $this-> belongsTo('App\Upload');
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function test() {
        return $this->belongsTo('App\Test');
    }
}
