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


$('#produto').change(function() {
	console.log("foi");
	var idServico = $(this).val();
	

	$.get('/get-preco/' + idServico, function(preco){
		$('#preco').val(preco);
	});
});