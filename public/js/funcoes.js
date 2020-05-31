function add(){

	var produto = $('#produto option:selected').text();
	var qtd = $('#qtd').val();
	var preco = $('#preco').val();

	var precoCompra = parseFloat(preco) * parseInt(qtd);

	$('#carrinho').append(
		'<tr>' +
		'<td>' + produto + '</td>' +
		'<td>' + qtd + '</td>' +
		'<td class="precoCompra">' + precoCompra + '</td>' +
		'</tr>');

	$('#teste').append('<input type="hidden" value= '+ produto +'  name="produto">');	

	var valorFinal = 0;
	$( ".precoCompra" ).each(function() {
      	valorFinal += parseFloat($( this ).text());
    });
	$( "#total" ).text('R$ ' + valorFinal);
}

$(document).ready(function(){
	$('#produto').change(function() {
		var idServico = $(this).val();
		
		$.get('/get-preco/' + idServico, function(preco){
			$('#preco').val(preco);
		});

		$.get('/get-qtd/' + idServico, function(qtd){
			document.getElementById("teste").innerHTML = 'Restam <b>' + qtd + '</b>  no estoque!'
		});
	});
});