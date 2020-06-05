@extends('adminlte::page')

@section('title', 'PetCariri - Novo Cliente')

@section('content')
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script type="text/javascript" src="{{url('js/jquery.mask.min.js')}}"></script>

<! -- Form Cliente -->
<div class="card card-info">
	<div class="card-header">
		<h3>Novo cliente</h3>
	</div>

	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('cliente')}}">
	@csrf

	<! -- Mensagem Erro -->
	<div class="card-body">
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

	</div>

    	<div class="card-body">
    		<! -- Campo Nome -->
    		<div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Nome</label>
            	<div class="col-sm-8">
            		<input name="nome" class="form-control" id="inputEmail3" placeholder="Nome">
            	</div>
            </div>

            <! -- Campo Email -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
            	<div class="col-sm-8">
            		<input name="email" class="form-control" id="inputEmail3" placeholder="Email">
            	</div>
            </div>

            <! -- Campo Telefone -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Telefone</label>
            	<div class="col-sm-8">
            		<input name="tel" class="form-control" id="tel" placeholder="Telefone">
            	</div>
            </div>

            <! -- Campo Endereço -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Endereço</label>
            	<div class="col-sm-8">
            		<input name="rua" class="form-control" id="inputEmail3" placeholder="Endereço">
            	</div>
            </div>

            <! -- Campo Bairro -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Bairro</label>
            	<div class="col-sm-8">
            		<input name="bairro" class="form-control" id="inputEmail3" placeholder="Bairro">
            	</div>
            </div>

            <! -- Campo Cidade -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Cidade</label>
            	<div class="col-sm-8">
            		<input name="cidade" class="form-control" id="inputEmail3" placeholder="Cidade">
            	</div>
            </div>

            <! -- Campo Cep -->
            <div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Cep</label>
            	<div class="col-sm-8">
            		<input name="cep" class="form-control" id="cep" placeholder="Cep">
            	</div>
            </div>
    	</div>
    
</div>

<! -- Form Animal -->
<div class="card card-info">
	<div class="card-header">
		<h3>Animal</h3>
	</div>
	<div class="card-body">
			

	    	<! -- Nome Animal -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-1 col-form-label">Nome</label>
	            	<div class="col-sm-8">
	            		<input name="animal" class="form-control" id="inputEmail3" placeholder="Nome">
	            	</div>
	        </div>
	        <! -- Espécie Animal -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-1 col-form-label">Espécie</label>
	            	<div class="col-sm-4">
	            		<input name="especie" class="form-control" id="inputEmail3" placeholder="Espécie">
	            	</div>
	        <! -- Pelagem Animal -->
	        	<label for="inputEmail3" class="col-sm-1 col-form-label">Pelagem</label>
	            	<div class="col-sm-4">
	            		<select name="pelagem" class="form-control">
    	            		<option disabled selected>------</option>
    	            		<option value="Pequena">Pequena</option>
    	            		<option value="Media">Média</option>
    	            		<option value="Grande">Grande</option>
    	            	</select>
	            	</div>
	        </div>
	        <! -- Cor Animal -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-1 col-form-label">Cor</label>
	            	<div class="col-sm-4">
	            		<input name="cor" class="form-control" id="inputEmail3" placeholder="Cor">
	            	</div>
	            <! -- Raça Animal -->	
	            <label for="raca" class="col-sm-1 col-form-label">Raça</label>
	            	<div class="col-sm-4">
	            		<input name="raca" class="form-control" id="inputEmail3" placeholder="Raça">
	            	</div>
	        </div>
	        
	        <! -- Nome Peso -->
			<div class="form-group row">
	        	<label for="peso" class="col-sm-1 col-form-label">Peso</label>
	            	<div class="col-sm-4">
	            		<input name="peso" class="form-control" id="inputEmail3" placeholder="Peso (Kg)">
	            	</div>
	            <! -- Sexo Animal -->
	        	<label for="inputEmail3" class="col-sm-1 col-form-label">Sexo</label>
	            <div class="col-sm-4">
	            	<select name="sexo" class="form-control">
	            		<option disabled selected>------</option>
	            		<option value="Macho">Macho</option>
	            		<option value="Femea">Fêmea</option>
	            	</select>
	            </div>	
	        </div>	
	        <div class="form-group row">
	        	<! -- Porte Animal -->
	        	<label for="inputEmail3" class="col-sm-1 col-form-label">Porte</label>
	            <div class="col-sm-4">
	            	<select name="porte" class="form-control">
	            		<option disabled selected>------</option>
	            		<option value="Pequeno">Pequeno</option>
	            		<option value="Medio">Médio</option>
	            		<option value="Grande">Grande</option>
	            	</select>
	            </div>	
	        </div>
	        
	        <! -- Obserções Gerais -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-2 col-form-label">Obserções Gerais</label>
	            	<div class="col-sm-12">
	            		<textarea name="obs" class="form-control" placeholder="Obserções Gerais..."></textarea>
	            	</div>
	        </div>

    </div>

</div>
<div class="form-group row">
	<div>
        <div class="col-md-12">
        	<button type="submit" class="btn btn-primary">Cadastrar</button>
	 	</div>
    </div>
</div>
</form>



<script type="text/javascript">
	$('#tel').mask('(99)99999-9999');
    $('#cep').mask('00000-000');
</script>

@endsection