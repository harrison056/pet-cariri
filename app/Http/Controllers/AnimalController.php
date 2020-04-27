<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class AnimalController extends Controller
{
    public function store(Request $request)
    {

    	$cliente = Cliente::find($request['cliente_id']);

    	$cliente->animal()->create([
            'nome' => $request['animal'],
            'raca' => $request['raca'],
            'peso' => $request['peso'],
            'obs' => $request['obs']
        ]);

        return redirect('cliente/' .$cliente->id)->with('success', 'Animal cadastrado com sucesso!');
    }
}
