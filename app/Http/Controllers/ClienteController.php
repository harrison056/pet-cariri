<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Endereco;
use App\Animal;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = Cliente::where('user_id', 'LIKE', Auth::user()->id)
        ->orderBy('nome', 'asc')
        ->paginate(5);

        return view('cliente.index', array('cliente'=> $cliente, 'animal' => null, 'buscar' => null));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
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
            'nome' => 'required|max:255',
            'telefone' => 'required|min:11|unique:clientes',
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'cep' => 'required|min:11',
            'email' => 'required|max:255|unique:svn_client_version()',
            'animal' => 'required',
            'raca' => 'required',
            'especie' => 'required',
            'pelagem' => 'required',
            'porte' => 'required',
            'raca' => 'required',
            'sexo' => 'required',
            'peso' => 'numeric'
        ]);

        try {
            $cliente = Cliente::create([
                'nome' => $request['nome'],
                'telefone' => $request['telefone'],
                'email' => $request['email'],
                'user_id' => Auth::user()->id
            ]);

            $cliente->endereco()->create([
                'rua' => $request['rua'],
                'bairro' => $request['bairro'],
                'cidade' => $request['cidade'],
                'cep' => $request['cep'],
            ]);    

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

            
            if ($cliente->save()) {
                return redirect('cliente/')->with('success', 'Cliente cadastrado com sucesso!');
        }
        } catch (Exception $e) {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        $endereco = $cliente->endereco;
        $animal = $cliente->animal;

        if ($cliente->user_id == Auth::user()->id) {
            return view('cliente.show', array('cliente' => $cliente,
                'endereco' => $endereco,
                'animal' => $animal
            ));
        }else{
            echo "Nop!!";
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
        $cliente = Cliente::find($id);
        $endereco = $cliente->endereco;

        if ($cliente->user_id == Auth::user()->id) {
            return view('cliente.edit', compact('cliente', 'id'), array('cliente' => $cliente, 'endereco' => $endereco));
        }else{
            echo "Nop!!";
        }
        
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
        $cliente = Cliente::find($id);

        $cliente->nome = $request->get('nome');
        $cliente->telefone = $request->get('tel');
        $cliente->email = $request->get('email');
        
        $cliente->endereco()->update([
            'rua' => $request['rua'],
            'bairro' => $request['bairro'],
            'cidade' => $request['cidade'],
            'cep' => $request['cep'],
        ]); 
        if ($cliente->save()) {
            return redirect('cliente/' .$id)->with('success', 'Alterações realizadas com sucesso!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        $cliente->endereco()->delete();
        $cliente->animal()->delete();
        $cliente->delete();
        
        return redirect('cliente/')->with('success','Cliente deletado com sucesso!');
    }


    public function busca(Request $request){
        $cliente = Cliente::where('nome', 'LIKE', '%'. $request->input('busca') .'%')
        ->where('user_id', 'LIKE', Auth::user()->id)
        ->paginate(10);

        $animal = Animal::where('nome', 'LIKE', '%'. $request->input('busca') .'%')
        ->paginate(10);

        return view('cliente.index', array('cliente' => $cliente, 'animal' => $animal, 'buscar' => $request->input('busca')));
    }

    
}
