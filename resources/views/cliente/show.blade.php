@extends('adminlte::page')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
@endif


<div>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">Adicionar novo Animal</button>
</div>
<br>

<div class="card card-info">
	<div class="card-header">
		
		<h3 class="box-title"><b>{{$cliente->nome}}</b></h3>
		
	</div>
	<div>
		<ul>
			<br>
			<li><strong>Email</strong> {{$cliente->email}}</li>
			<li><strong>Telefone</strong> {{$cliente->telefone}}</li>

			<li><strong>Rua</strong> {{$endereco->rua}}</li>
			<li><strong>Bairro</strong> {{$endereco->bairro}}</li>
			<li><strong>Cidade</strong> {{$endereco->cidade}}</li>
			<li><strong>Cep</strong> {{$endereco->cep}}</li>

			<li><strong>Adicionado em </strong> {{date("d/m/Y H:i", strtotime($cliente->created_at))}}</li>
		</ul>
	</div>
	<div class="card-body">
		<a href="{{URL::to('cliente/' .$cliente->id. '/edit')}}"><button type="submit" class="btn btn-primary">Editar cadastro</button></a>

		<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Excluir Cliente</button>
	</div>
	
</div>

@foreach($animal as $animals)
<div class="card card-info">
	<div class="card-header">
		<h3 class="box-title"><b>Animal</b></h3>
	</div>

	<div>
		<ul>
			<br>
			<li><strong>Nome </strong> {{$animals->nome}}</li>
		</ul>
		<div class="card-body">
			<a href="{{URL::to('animal/' .$animals->id. '/agendarservico')}}"><button type="submit" class="btn btn-primary">Agendar consulta</button></a>
		</div>
	</div>
</div>
@endforeach


<!-- /.modal Excluir cliente-->

      <div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Excluir paciente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Tem certeza que deseja excluir paciente permanentemente?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Fechar</button>
              <form method="POST" action="{{action('ClienteController@destroy', $cliente->id)}}">
					@csrf
					<input type="hidden" name="_method" value="DELETE">
					<button class="btn btn-outline-light">Excluir</button>
				</form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- /.modal -->

<!-- /.modal -->

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Excluir paciente</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form method="POST" action="{{action('AnimalController@store')}}">
            @csrf
            <div class="modal-body">
              <! -- Nome Animal -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-2 col-form-label">Nome</label>
	            	<div class="col-sm-6">
	            		<input name="animal" class="form-control" id="inputEmail3" placeholder="Nome">
	            	</div>
	        </div>

	        <! -- Nome Raça -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-2 col-form-label">Raça</label>
	            	<div class="col-sm-6">
	            		<input name="raca" class="form-control" id="inputEmail3" placeholder="Raça">
	            	</div>
	        </div>

	        <! -- Nome Peso -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-2 col-form-label">Peso</label>
	            	<div class="col-sm-6">
	            		<input name="peso" class="form-control" id="inputEmail3" placeholder="Peso">
	            	</div>
	        </div>

	        <! -- Obserções Gerais -->
			<div class="form-group row">
	        	<label for="inputEmail3" class="col-sm-4 col-form-label">Obserções Gerais</label>
	            	<div class="col-sm-12">
	            		<textarea  name="obs" class="form-control" placeholder="Obserções Gerais...">
	            		</textarea>
	            	</div>
	        </div>

	        <input type="hidden" name="cliente_id" id="cliente_id" value="{{$cliente->id}}">

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-defaul" data-dismiss="modal">Fechar</button>
				<button class="btn btn-primary">Cadastrar</button>
			</form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

@endsection

