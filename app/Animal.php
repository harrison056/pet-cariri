<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //
    
    public function cliente()
    {
       	return $this->belongsTo('App\Cliente');
    }
}
