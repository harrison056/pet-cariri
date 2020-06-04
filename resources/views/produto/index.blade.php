@extends('adminlte::page')

@section('title', 'PetCariri - Produtos')

@section('content')

<div class="card card-success">
	<div class="card-header">
		<h4 class="box-title"><b>Adicionar Produto</b></h4>
	</div>

	<div class="card-body">
    	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('produto')}}">
        @csrf
        	<div class="form-group row">
        		<! -- Campo Produto -->
                	<label for="inputEmail3" class="col-sm-1 col-form-label">Produto</label>
             	<div class="col-sm-3">
               		<input name="nome" class="form-control" placeholder="Produto">
            	</div>
                <div class="col-sm-1"></div>

            	<! -- Campo Quantidade -->
            	<label for="inputEmail3" class="col-sm-1.5 col-form-label">Quantidade</label>
             	<div class="col-sm-2">
               		<input name="qtd" type="number" min="0" class="form-control" placeholder="0">
            	</div>
                <div class="col-sm-1"></div>

                <! -- Campo Preço -->
                <label for="inputEmail3" class="col-sm-1.5 col-form-label">Preço</label>
                <div class="col-sm-2">
                    <input name="preco" type="number" class="form-control" step="0.01">
                </div>
        	</div>
            <br>

        	<! -- Campo Descrição -->
        	<div class="form-group row">
                	<label for="inputEmail3" class="col-sm-1 col-form-label">Descrição</label>
             	<div class="col-sm-8">
                    <textarea name="descricao" class="form-control" rows="3" cols="76" placeholder="Descrição"></textarea>
            	</div>
        	</div>
            
            <div class="form-group row">
                <button type="submit" class="btn btn-success">Adicionar</button>
            </div>

        </form>
    	
    </div>

</div>

<div class="box box-primary">
    <table class="table table-head-fixed text-nowrap">
        <thead>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Adicionado em</th>
        </thead>
        <tbody>
            @foreach ($produto as $produtos)
                <tr>
                    <td>{{ $produtos->nome }}</td>
                    <td>{{ $produtos->descricao }}</td>
                    <td>{{ $produtos->qtd }}</td>
                    <td>{{ $produtos->preco }}</td>
                    <td>{{date("d/m/Y", strtotime($produtos->created_at))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$produto->links()}}
</div>

@endsection