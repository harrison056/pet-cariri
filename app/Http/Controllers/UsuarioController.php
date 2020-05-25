<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\AgendarServico;
use App\Animal;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index()
    {
    	
    	$m = Carbon::now();
    	$mytime = Carbon::parse($m)->format('Y/m/d');

		$agenda = $agenda = AgendarServico::whereDate('data', $mytime)
		->where('user_id', Auth::user()->id)
		->get();

        return view('index', array('agenda' => $agenda));
    }
}