<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    public function upload() {
        return $this->hasOne('App\Upload');
    }
    
}
