@extends('adminlte::page')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
@endif


<h1>Index</h1>


<a href="cliente/create">novo cliente</a>
<br>
<a href="cliente">clientes</a>
<br>
<a href="produto">Produtos</a>
<br>
<a href="servico/create">Novo serviço</a>


@endsection