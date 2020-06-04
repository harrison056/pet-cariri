<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\VendaProduto;
use App\Venda;
use App\User;
use Illuminate\Support\Facades\Auth;

class VendaController extends Controller
{
    public function create()
    {
        $produto = Produto::all()->where('user_id', Auth::user()->id);

        return view('venda.create', array('produto' => $produto));
    }

    public function store(Request $request)
    {

        $user = User::find(Auth::user()->id);

        $venda = $user->venda()->create([
            'preco' => $request['valorFinal']
        ]);

        for ($i = 0; $i < count($request->produto_id); $i++) 
        {
            
            $venda->venda_produto()->create([
                'qtd_produto' => $request->qtd[$i],
                'preco' => $request->precoCompra[$i],
                'produto_id' => $request->produto_id[$i]
            ]);
        }
        return redirect('/index');
    }



    public function getPreco($idProduto)
    {
    	$produto = Produto::find($idProduto);
    	$preco = $produto->preco;
    	
    	return $preco;
    }

    public function getQtd($idProduto)
    {
        $produto = Produto::find($idProduto);
        $qtd = $produto->qtd;
        
        return $qtd;
    }
}
