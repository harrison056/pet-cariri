@extends('adminlte::page')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
@endif

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

<div class="card card-info">
	<div class="card-header">
		<h3 class="box-title"><b>Animal</b></h3>
	</div>

	<div>
		<ul>
			<br>
			<li><strong>Nome </strong> {{$animal->nome}}</li>
		</ul>
	</div>
</div>



<!-- /.modal -->

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

@endsection

