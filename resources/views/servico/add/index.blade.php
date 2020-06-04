@extends('adminlte::page')

@section('title', 'PetCariri - Serviços')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Serviços Cadastrados</h3>

        <div class="card-tools">
            <span class="badge badge-info">{{ count($servico) }}  Serviços</span>
            
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
    	<table class="table table-hover table-bordered">
    		<thead>
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição</th>
            </thead>
            <tbody>
            	@foreach ($servico as $servicos)
            	<tr>
            		<td>{{ $servicos->nome }}</td>
            		<td>{{ $servicos->preco }}</td>
            		<td>{{ $servicos->descricao }}</td>
            	</tr>
            	@endforeach
            </tbody>
    	</table>
    </div>    
    
</div>

@endsection