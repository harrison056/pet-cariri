<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = ['rua', 'bairro', 'cidade','cep', 'cliente_id'];

    public function cliente()
    {
       	return $this->belongsTo('App\Cliente');
    }
}
