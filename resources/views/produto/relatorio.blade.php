@extends('adminlte::page')

@section('title', 'PetCariri - Estoque')

@section('content')

<div>
	<a href="/relatorio_baixa_estoque/pdf"><button class="btn btn-info">Gerar PDF</button></a>
</div>
<br>

<table class="table table-hover table-bordered">
	<thead>
		<th>Produto</th>
        <th>Quantidade</th>
        <th>Comprado em</th>
	</thead>
	<tbody>
        @foreach($venda as $vendas)
        	@foreach($vendas->venda_produto()->get() as $produtos)
	            <tr>
	                <td>{{$produtos->produto}}</td>
	                <td>{{$produtos->qtd_produto}}</td>
	                <td>{{date("d/m/Y H:i", strtotime($produtos->created_at))}}</td>
	                <td><a href="venda/{{ $produtos->venda->id }}">detalhes da venda</a></td>
	            </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

@endsection