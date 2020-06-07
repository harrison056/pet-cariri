<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class AnimalController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request,[
            'animal' => 'required',
            'raca' => 'required',
            'especie' => 'required',
            'pelagem' => 'required',
            'porte' => 'required',
            'raca' => 'required',
            'sexo' => 'required',
            'peso' => 'numeric'
        ]);

    	$cliente = Cliente::find($request['cliente_id']);

    	$cliente->animal()->create([
            'nome' => $request['animal'],
            'especie' => $request['especie'],
            'pelagem' => $request['pelagem'],
            'cor' => $request['cor'],
            'porte' => $request['porte'],
            'sexo' => $request['sexo'],
            'raca' => $request['raca'],
            'peso' => $request['peso'],
            'obs' => $request['obs']
        ]);

        return redirect('cliente/' .$cliente->id)->with('success', 'Animal cadastrado com sucesso!');
    }
}
