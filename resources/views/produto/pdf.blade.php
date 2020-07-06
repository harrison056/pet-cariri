<!DOCTYPE html>
<html>
<head>
	<title>Relátorio - Estoque</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<center>
			<img src="img/petpqn.png" width="100">
			<h1>Relatório - Estoque</h1>
		</center>
	</div>
	
	<table class="table">
        <thead>
        	<tr>
        		<th>Nome</th>
	            <th>Descrição</th>
	            <th>Quantidade</th>
	            <th>Preço</th>
        	</tr>
        </thead>
        <tbody>
            @foreach ($produto as $produtos)
                <tr>
                    <td>{{ $produtos->nome }}</td>
                    <td>{{ $produtos->descricao }}</td>
                    <td>{{ $produtos->qtd }}</td>
                    <td>R$ {{ number_format($produtos->preco, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>