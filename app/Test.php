<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function grades() {
        return $this->hasMany('App\Grade');
    }
}
