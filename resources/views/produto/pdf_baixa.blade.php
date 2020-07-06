<!DOCTYPE html>
<html>
<head>
	<title>Baixa de Estoque</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<center>
			<img src="img/petpqn.png" width="100">
			<h1>Relatório - Baixa de estoque</h1>
		</center>
	</div>
	
	<table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Comprado em</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venda as $vendas)
                @foreach($vendas->venda_produto()->get() as $produtos)
                    <tr>
                        <td>{{$produtos->produto}}</td>
                        <td>{{$produtos->qtd_produto}}</td>
                        <td>{{date("d/m/Y", strtotime($produtos->created_at))}}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>