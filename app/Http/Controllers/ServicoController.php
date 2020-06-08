<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
use Illuminate\Support\Facades\Auth;

class ServicoController extends Controller
{

    public function index()
    {
        $servico = Servico::all()
        ->where('user_id', Auth::user()->id);
        
        return view('servico.add.index', array('servico' => $servico));
    }

	public function create()
    {
        return view('servico.add.create');
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'nome' => 'required',
            'preco' => 'required|numeric'
        ]);


        if ( empty ($request['descricao']) ){
            $descricao = ($request['descricao']);
        }else{
            $descricao = 'Sem descricão';
        }
    
    
        $servico = Servico::create([
            'nome' => $request['nome'],
            'preco' => $request['preco'],
            'descricao' => $descricao,
            'user_id' => Auth::user()->id
        ]);
        
        if ($servico->save()) {
            return redirect('servico/create')->with('success', 'Serviço cadastrado');
        }

    }
}
