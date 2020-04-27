@extends('adminlte::page')

@section('content')

<div class="card card-info">
	<div class="card-header">
		<h4 class="box-title"><b>Adicionar Produto</b></h4>
	</div>

	<div class="card-body">
    	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('produto')}}">
        @csrf
        	<div class="form-group row">
        		<! -- Campo Produto -->
                	<label for="inputEmail3" class="col-sm-1 col-form-label">Produto</label>
             	<div class="col-sm-5">
               		<input name="nome" class="form-control" placeholder="Produto">
            	</div>

            	<! -- Campo Quantidade -->
            	<label for="inputEmail3" class="col-sm-1.5 col-form-label">Quantidade</label>
             	<div class="col-sm-2">
               		<input name="qtd" type="number" class="form-control" placeholder="Quantidade">
            	</div>
        	</div>


        	<! -- Campo Descrição -->
        	<div class="form-group row">
                	<label for="inputEmail3" class="col-sm-1 col-form-label">Descrição</label>
             	<div class="col-sm-8">
               		<input name="descricao" class="form-control" placeholder="Descrição">
            	</div>
        	</div>

            <div class="form-group row">
                <button type="submit" class="btn btn-primary">Adicionar</button>
            </div>

        </form>
    	
    </div>

</div>

<div class="box box-primary">
    <table class="table table-hover table-bordered">
        <thead>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Adicionado em</th>
        </thead>
        <tbody>
            @foreach ($produto as $produtos)
                <tr>
                    <td>{{ $produtos->nome }}</td>
                    <td>{{ $produtos->descricao }}</td>
                    <td>{{ $produtos->qtd }}</td>
                    <td>{{date("d/m/Y", strtotime($produtos->created_at))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection