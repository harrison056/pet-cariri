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
            <table class="table table-head-fixed text-nowrap">
                <thead>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Valor</th>
                </thead>
                <tbody>
                    @foreach ($vendas->venda_produto as $produtos)
                    <tr>
                        <td>{{ $produtos->produto }}</td>
                        <td>{{ $produtos->qtd_produto }}</td>
                        <td>{{ $produtos->preco }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
        <div class="card-footer">
            <h4>Valor total: R$ {{ $vendas->preco }}</h4>
        </div>  
    </div>   
@endforeach
{{$venda->links()}}

@endsection