<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AgendarServico;
use App\Cliente;
use App\Venda;
use App\Produto;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
    	
        $cliente = Cliente::all()->where('user_id', Auth::user()->id);
        $venda = Venda::all()->where('user_id', Auth::user()->id);
        $produto = Produto::all()->where('user_id', Auth::user()->id);

    	$m = Carbon::now();
    	$mytime = Carbon::parse($m)->format('Y/m/d');

		$agenda = $agenda = AgendarServico::whereDate('data', $mytime)
		->where('user_id', Auth::user()->id)
		->get();
        
        return view('index', array('agenda' => $agenda, 'cliente' => $cliente, 'venda' => $venda, 'produto' => $produto));
    }
}