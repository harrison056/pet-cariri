@extends('adminlte::page')

@section('title', 'PetCariri - Vendas')
@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Vendas Realizadas</h3>

        <div class="card-tools">
            <span class="badge badge-success">{{ count($venda) }}  Vendas</span>
            
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
    	
    </div>    
    
</div>


@endsection