<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
	protected $fillable = ['user_id', 'preco'];

    public function venda_produto()
    {
        return $this->hasMany('App\VendaProduto');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
