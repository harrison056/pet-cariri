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
        return view('cliente.index');
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
            'tel' => 'required',
            'rua' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'cep' => 'numeric|required',
            'email' => 'required|max:255',
            'animal' => 'required',
            'raca' => 'required',
            'peso' => 'numeric|required'
        ]);

        $cliente = Cliente::create([
            'nome' => $request['nome'],
            'telefone' => $request['tel'],
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
            'raca' => $request['raca'],
            'peso' => $request['peso'],
            'obs' => $request['obs']
        ]);

        return redirect('cliente/')->with('success', 'Cliente cadastrado com sucesso!');

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
        return view('cliente.show', array('cliente' => $cliente));
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
        return view('cliente.edit', compact('cliente', 'id'), array('cliente' => $cliente));
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
        $cliente->endereco->rua = $request->get('rua');//TESTAAAAR
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

        $cliente->delete();

        return redirect('cliente/')->with('success','Cliente deletado com sucesso!');
    }

/*
    public function cadastraAnimal()
    {
        
    }
 */

    public function busca(Request $request){
        $cliente = Cliente::where('nome', 'LIKE', '%'.$request->input('busca').'%')
        ->where('user_id', 'LIKE', Auth::user()->id)
        ->paginate(10);

        return view('cliente.index', array('cliente' => $cliente, 'buscar' => $request->input('busca')));
    }

    

    private function validarCep($cep) {
        // retira espacos em branco
        $cep = trim($cep);
        // expressao regular para avaliar o cep
        $avaliaCep = preg_match("/[0-9]{5}-[0-9]{3}/", $cep);
        
        // verifica o resultado
        if(!$avaliaCep) {            
            return false;
        }else{
            return true;
        }
    }

    private function validarTelefone($Telefone) {
        
        $Telefone = trim($Telefone);
        
        $avaliaTel = preg_match('/^\(\d{2}\)\d{4,5}-\d{4}$/', $Telefone);
        
        // verifica o resultado
        if(!$avaliaTel) {            
            return false;
        }else{
            return true;
        }
    }
    
}
