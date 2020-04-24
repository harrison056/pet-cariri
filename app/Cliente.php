<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //


    public function animal(){
        return $this->hasMany('App\Animal');
    }
}
