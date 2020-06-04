@extends('adminlte::page')

@section('title', 'PetCariri - Vendas')
@section('content')


@foreach($venda as $vendas)
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{date("d/m/Y H:i", strtotime($vendas->created_at))}}</h1>
        </div>
        <!-- /.card-header -->
        <div class="card-body">


            
        </div>  
        <div class="card-footer">
            <h4>Valor total: R$ {{ $vendas->preco }}</h4>
        </div>  
    </div>   
@endforeach


@endsection