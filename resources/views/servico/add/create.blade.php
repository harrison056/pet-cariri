@extends('adminlte::page')

@section('content')

<div class="card card-info">
	<div class="card-header">
		<h3>Adicionar Serviço</h3>
	</div>

	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('servico')}}">
	@csrf

		<div class="card-body">
			<! -- Campo Serviço -->
			<div class="form-group row">
		        <label for="inputEmail3" class="col-sm-1 col-form-label">Nome</label>
		            <div class="col-sm-8">
		            	<input name="nome" class="form-control" id="inputEmail3">
		            </div>
		    </div>

		    <! -- Campo Descrição -->
			<div class="form-group row">
		        <label for="inputEmail3" class="col-sm-1 col-form-label">Descrição</label>
		            <div class="col-sm-8">
		            	<textarea name="descricao" class="form-control" rows="5" cols="76"></textarea>
		            </div>
		    </div>
		    
		    <div class="form-group row">
		    	<button type="submit" class="btn btn-primary">Adicionar</button>
		    </div>

		</div>

	</form>
</div>

@endsection