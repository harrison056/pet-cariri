<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome', 'qtd', 'preco', 'user_id'];
    protected $attributes = ['descricao' => 'Sem descrição'];

}
