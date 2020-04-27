<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['nome', 'raca', 'peso', 'cliente_id'];
    
    public function cliente()
    {
       	return $this->belongsTo('App\Cliente');
    }
}
