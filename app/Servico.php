<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $fillable = ['nome', 'preco', 'user_id'];

    public function agendarServico()
    {
        return $this->belongsTo('App\AgendarServico');
    }
}
