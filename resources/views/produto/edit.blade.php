@extends('adminlte::page')

@section('title', 'PetCariri - Produtos')

@section('content')

<div class="card card-success">
	<div class="card-header">
		<h4 class="box-title"><b>Adicionar Produto</b></h4>
	</div>

	<div class="card-body">
    	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{action('ProdutoController@update', $id)}}">
        @csrf
        <input type="hidden" name="_method" value="PATCH">

        	<div class="form-group row">
        		<! -- Campo Produto -->
                	<label for="inputEmail3" class="col-sm-1 col-form-label">Produto</label>
             	<div class="col-sm-3">
               		<input name="nome" value="{{$produto->nome}}" class="form-control" placeholder="Produto">
            	</div>
                <div class="col-sm-1"></div>

            	<! -- Campo Quantidade -->
            	<label for="inputEmail3" class="col-sm-1.5 col-form-label">Quantidade</label>
             	<div class="col-sm-2">
               		<input name="qtd" value="{{$produto->qtd}}" type="number" min="0" oninput="validity.valid||(value='');" class="form-control">
            	</div>
                <div class="col-sm-1"></div>

                <! -- Campo Preço -->
                <label for="inputEmail3" class="col-sm-1.5 col-form-label">Preço</label>
                <div class="col-sm-2">
                    <input name="preco" type="number" value="{{$produto->preco}}" min="0" class="form-control" step="0.01">
                </div>
        	</div>
            <br>

        	<! -- Campo Descrição -->
        	<div class="form-group row">
                	<label for="inputEmail3" class="col-sm-1 col-form-label">Descrição</label>
             	<div class="col-sm-8">
                    <textarea name="descricao" value="{{$produto->descricao}}" class="form-control" rows="3" cols="76" placeholder="Descrição"></textarea>
            	</div>
        	</div>
            
            <div class="form-group row">
                <button type="submit" class="btn btn-success">Alterar</button>
            </div>
        </form>	
    </div>
</div>

@endsection