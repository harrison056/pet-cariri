<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendaProduto extends Model
{
	protected $fillable = ['produto_id', 'venda_id', 'qtd_produto', 'produto', 'preco'];

    public function venda()
    {
        return $this->belongsTo('App\Venda');
    }
}
