@extends('adminlte::page')

@section('title', 'PetCariri - Serviços')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
@endif

<div class="card card-info">
	<div class="card-header">
		<h3>Adicionar Serviço</h3>
	</div>

	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('servico')}}">
	@csrf

		<div class="card-body">
			<! -- Mensagem Erro -->
	        @if($message = Session::get('danger'))
	            <div class="alert alert-danger">
	                {{$message}}
	            </div>
	        @endif

	        @if(count($errors)>0)
	        <div class="alert alert-danger">
	            <ul>
	                @foreach($errors->all() as $error)
	                <li>{{$error}}</li>
	                @endforeach
	            </ul>
	        </div>
	        @endif
			
			<! -- Campo Serviço -->
			<div class="form-group row">
		        <label for="inputEmail3" class="col-sm-1 col-form-label">Nome</label>
		            <div class="col-sm-5">
		            	<input name="nome" class="form-control" id="inputEmail3">
		            </div>
		        <label for="inputEmail3" class="col-sm-1 col-form-label">Valor</label>
		            <div class="col-sm-2">
		            	<input name="preco" type="number" min="0" step="0.01" class="form-control" placeholder="R$" >
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