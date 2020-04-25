@extends('adminlte::page')

@section('content')

<! -- Form Cliente -->
<div class="card card-info">
	<div class="card-header">
		<h3>Alterar dados do cliente</h3>
	</div>

	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{action('ClienteController@update', $id)}}">
	@csrf
	<input type="hidden" name="_method" value="PATCH">

	

    	<div class="card-body">
    		<! -- Campo Nome -->
    		<div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Nome</label>
            	<div class="col-sm-8">
            		<input name="nome" value="{{$cliente->nome}}" class="form-control" id="inputEmail3" placeholder="Nome">
            	</div>
            </div>

            <! -- Campo Email -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
            	<div class="col-sm-8">
            		<input name="email" value="{{$cliente->email}}" class="form-control" id="inputEmail3" placeholder="Email">
            	</div>
            </div>

            <! -- Campo Telefone -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Telefone</label>
            	<div class="col-sm-8">
            		<input name="tel" value="{{$cliente->telefone}}" class="form-control" id="inputEmail3" placeholder="Telefone">
            	</div>
            </div>

            <! -- Campo Endereço -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Endereço</label>
            	<div class="col-sm-8">
            		<input name="rua" value="{{$endereco->rua}}" class="form-control" id="inputEmail3" placeholder="Endereço">
            	</div>
            </div>

            <! -- Campo Bairro -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Bairro</label>
            	<div class="col-sm-8">
            		<input name="bairro" value="{{$endereco->bairro}}" class="form-control" id="inputEmail3" placeholder="Bairro">
            	</div>
            </div>

            <! -- Campo Cidade -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Cidade</label>
            	<div class="col-sm-8">
            		<input name="cidade" value="{{$endereco->cidade}}" class="form-control" id="inputEmail3" placeholder="Cidade">
            	</div>
            </div>

            <! -- Campo Cep -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Cep</label>
            	<div class="col-sm-8">
            		<input name="cep" value="{{$endereco->cep}}" class="form-control" id="inputEmail3" placeholder="Cep">
            	</div>
            </div>
    	</div>

    	<div class="form-group row">
			<div class="col-md-2">
        		<div class="col-md-10">
        			<button type="submit" class="btn btn-primary">Cadastrar</button>
	 			</div>
    		</div>
    	</div>	
    </form>
</div>
    
</div>

@endsection