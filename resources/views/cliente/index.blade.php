@extends('adminlte::page')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
@endif

<div class="row">
	<div class="col-md-12">
		<form method="POST" action="{{url('cliente/busca')}}">
			@csrf
				<div class="input-group">
					<input type="text" class="form-control" id="busca" name="busca" value="{{$buscar}}" placeholder="Buscar Clientes">
					<span class="input-group-btn">
						<button class="btn btn-outline-secondary">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
		</form>
	</div>
</div>
<br>

	
@foreach($cliente as $clientes)
	<div class="card card-info">
		<div class="card-header">
			<a href="{{URL::to('cliente')}}/{{$clientes->id}}">
				<h3 class="box-title"><b>{{$clientes->nome}}</b></h3>
			</a>
		</div>
		<div>
			<ul>
				<li><strong>Email</strong> {{$clientes->email}}</li>
				<li><strong>Telefone</strong> {{$clientes->telefone}}</li>
				<li><strong>Adicionado em: </strong> {{date("d/m/Y H:i", strtotime($clientes->created_at))}}</li>
			</ul>
		</div>
	</div>
<br>	
@endforeach
	
{{$cliente->links()}}
	

@endsection
