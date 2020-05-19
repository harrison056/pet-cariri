<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller
{
    public function create()
    {
        $produto = Produto::all()->where('user_id', Auth::user()->id);

        return view('venda.create', array('produto' => $produto));
    }

    public function getPreco($idProduto)
    {
    	$produto = Produto::find($idProduto);
    	$preco = $produto->preco;
    	
    	return $preco;
    }
}
