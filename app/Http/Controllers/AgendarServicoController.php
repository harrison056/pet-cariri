<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Animal;
use App\Servico;
use App\AgendarServico;
use Illuminate\Support\Facades\Auth;


class AgendarServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenda = AgendarServico::all()->where('user_id', Auth::user()->id);
        
<<<<<<< HEAD
=======
        echo $agenda;
        exit();
        
>>>>>>> 38e208705f1ebefbc9ac53cb844b02e1c3fbc124
        return view('servico.agenda.index', array('agenda' => $agenda));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($animal)
    {
        $a = Animal::find($animal);
        $servico = Servico::all()->where('user_id', Auth::user()->id);

        return view('servico.agenda.create',
         array('a' => $a, 'servico' => $servico));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        AgendarServico::create([
            'data' => $request['data'],
            'hora' => $request['hora'],
            'servico_id' => $request ['servico_id'],
            'animal_id' => $request['animal_id'],
            'user_id' => Auth::user()->id,
            'descricao' => $request['descricao']
        ]);
        
       
        return redirect('agenda/')->with('success', 'Agendado!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
