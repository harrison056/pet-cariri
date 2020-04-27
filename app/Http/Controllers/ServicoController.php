<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Servico;
use Illuminate\Support\Facades\Auth;

class ServicoController extends Controller
{

	public function create()
    {
        return view('servico.add.create');
    }

    public function store(Request $request)
    {

    	$servico = Servico::create([
            'nome' => $request['nome'],
            'descricao' => $request['descricao'],
            'user_id' => Auth::user()->id
        ]);    

        if ($servico->save()) {
            return redirect('index/')->with('success', 'Serciço cadastrado');
        }

    }
}
