<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Vacina;
use Illuminate\Support\Facades\Auth;

class VacinaController extends Controller
{
    public function index($animal)
    {
        $a = Animal::find($animal);
        $vacina = $a->vacina()->get();

        if ($a->cliente->user_id == Auth::user()->id) {
            return view('vacina.index', array('a' => $a, 'vacina' => $vacina));
        }else{
            echo "Nop!";
        }
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'data' => 'required',
            'nome' => 'required'
        ]);

        $animal = Animal::find($request['animal_id']);
		$vacina = $animal->vacina()->create([
        	'data' => $request['data'],
			'nome' => $request['nome']
		]);
		$vacina->save();
		return redirect('/animal/' .$animal->id. '/vacinas')->with('success', 'Adicionado!');
    }
}
