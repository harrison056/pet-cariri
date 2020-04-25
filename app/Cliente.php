<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'email', 'telefone','user_id'];

    public function animal()
    {
        return $this->hasMany('App\Animal');
    }

    public function endereco()
    {
        return $this->hasOne('App\Endereco');
    }
}
