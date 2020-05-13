<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgendarServico extends Model
{
    protected $fillable = ['data','hora', 'servico_id', 'animal_id', 'user_id'];

    public function servico()
    {
       	return $this->hasMany('App\Servico');
    }

}
