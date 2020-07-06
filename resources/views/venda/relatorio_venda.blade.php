<!DOCTYPE html>
<html>
<head>
	<title>Relátorio - Vendas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<center>
			<img src="img/petpqn.png" width="100">
			<h1>Relatório - Vendas mês {{ $dataVenda }}</h1>
		</center>
	</div>
	
	@foreach($vendaFinal as $vendas)
        <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Comprado em</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vendas->venda_produto as $produtos)
            <tr>
                <td>{{ $produtos->produto }}</td>
                <td>{{ $produtos->qtd_produto }}</td>
                <td>{{ $produtos->preco }}</td>
            </tr>
            @endforeach
            <tr>
                <td>Valor da compra: R$ {{ $vendas->preco }}</td>
                <td></td>
                <td>Data da venda: {{date("d/m/Y", strtotime($vendas->created_at))}}</td>
            </tr>
        </tbody>
    @endforeach
</body>
</html>