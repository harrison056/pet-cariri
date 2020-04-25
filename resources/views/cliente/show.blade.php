@extends('adminlte::page')

@section('content')


<div class="card card-info">
	<div class="card-header">
		
		<h3 class="box-title"><b>{{$cliente->nome}}</b></h3>
		
	</div>
	<div>
		<ul>
			<li><strong>Email</strong> {{$cliente->email}}</li>
			<li><strong>Telefone</strong> {{$cliente->telefone}}</li>

			<li><strong>Rua</strong> {{$endereco->rua}}</li>
			<li><strong>Bairro</strong> {{$endereco->bairro}}</li>
			<li><strong>Cidade</strong> {{$endereco->cidade}}</li>
			<li><strong>Cep</strong> {{$endereco->cep}}</li>

			<li><strong>Adicionado em: </strong> {{date("d/m/Y H:i", strtotime($cliente->created_at))}}</li>
		</ul>
	</div>
</div>

<div class="card card-info">
	<div class="card-header">
		<h3 class="box-title"><b>Animal</b></h3>
	</div>

	<div>
		<ul>
			<li><strong>Nome</strong>{{$animal}} </li>
		</ul>
	</div>
</div>

@endsection