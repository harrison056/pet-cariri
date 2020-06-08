<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produto = Produto::where('user_id', 'LIKE', Auth::user()->id)
        ->orderBy('created_at', 'asc')
        ->paginate(30);

        return view('produto.index', array('produto'=> $produto,'buscar' => null));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'nome' => 'required',
            'qtd' => 'required',
            'preco' => 'required'
        ]);

        if ( empty($request['descricao']) ) {
            $descricao = 'Sem descrição';
        }else{
            $descricao = $request['descricao'];
        }
        

        $produto = Produto::create([
            'nome' => $request['nome'],
            'descricao' => $descricao,
            'qtd' => $request['qtd'],
            'preco' => $request['preco'],
            'user_id' => Auth::user()->id
        ]);    

        if ($produto->save()) {
            return redirect('produto/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
