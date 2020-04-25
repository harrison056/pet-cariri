<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['nome', 'raca', 'peso','obs', 'cliente_id'];
    
    public function cliente()
    {
       	return $this->belongsTo('App\Cliente');
    }
}
