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

    public function index()
    {
        $venda = Venda::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'asc')
        ->paginate(10);

        return view('venda.index', array('venda' => $venda));
    }

    public function create()
    {
        $produto = Produto::all()->where('user_id', Auth::user()->id);

        return view('venda.create', array('produto' => $produto));
    }

    public function store(Request $request)
    {
        
        if ($request->valorFinal == 0) {
            return redirect('/venda/create')->with('danger', 'Nenhum produto adicionado!');
        }else{
            $user = User::find(Auth::user()->id);

            $venda = $user->venda()->create([
                'preco' => $request['valorFinal']
            ]);

            for ($i = 0; $i < count($request->produto_id); $i++) 
            {
                $produto = Produto::find($request->produto_id[$i]);
                if ($produto->qtd < $request->qtd[$i]) {
                    return back()->with('danger', 'Quantidade solicitada de ' .$produto->nome.' maior que o estoque!');
                }else{
                    $venda_produto = $venda->venda_produto()->create([
                        'qtd_produto' => $request->qtd[$i],
                        'preco' => $request->precoCompra[$i],
                        'produto_id' => $request->produto_id[$i],
                        'produto' => $request->produto[$i]
                    ]);
                    //Baixa no estoque
                    $produto->qtd -= $venda_produto->qtd_produto;
                    $produto->save();
                }
            }

            return redirect('/index');
        }
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
