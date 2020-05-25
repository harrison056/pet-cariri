<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = ['nome', 'raca', 'peso', 'especie', 'pelagem', 'cor','porte','sexo','cliente_id'];
    
    public function cliente()
    {
       	return $this->belongsTo('App\Cliente');
    }

    public function agendarServico()
    {
       	return $this->hasMany('App\AgendarServico');
    }
}
