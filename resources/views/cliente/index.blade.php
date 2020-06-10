@extends('adminlte::page')

@section('title', 'PetCariri - Cliente')

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
@endforeach
	
{{$cliente->links()}}

@if($animal == null)

@else
@foreach($animal as $animals)
	@if( $animals->cliente->user_id == Auth::user()->id )
		<div class="card card-info">
			<div class="card-header">
				<a href="{{URL::to('cliente')}}/{{$animals->cliente->id}}">
					<h3 class="box-title"><b>{{$animals->cliente->nome}}</b></h3>
				</a>
			</div>
			<div>
				<ul>
					<li><strong>Email</strong> {{$animals->cliente->email}}</li>
					<li><strong>Telefone</strong> {{$animals->cliente->telefone}}</li>
					<li><strong>Adicionado em: </strong> {{date("d/m/Y H:i", strtotime($animals->cliente->created_at))}}</li>
				</ul>
			</div>
		</div>
	@endif	
<br>	
@endforeach
	
{{$animal->links()}}	
@endif
@endsection