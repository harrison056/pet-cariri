function add(){

	var produto_id = $('#produto option:selected').val();
	var produto = $('#produto option:selected').text();
	var qtd = $('#qtd').val();
	var preco = $('#preco').val();

	var precoCompra = parseFloat(preco) * parseInt(qtd);
	
	$('#carrinho').append(
		'<tr id="linha">' +
		'<td hidden> <input type="hidden" class="form-control" name="produto_id[]" value="' + produto_id + '"></td>'+
		'<td> <input type="hidden" class="form-control" name="produto[]" value="' + produto + '">' + produto + '</td>' +
		'<td> <input type="hidden" class="form-control" name="qtd[]" value="' + qtd + '">' + qtd + '</td>' +
		'<td class="precoCompra"> <input type="hidden" class="form-control" name="precoCompra[]" value="' + precoCompra + '">' + precoCompra + '</td>' +
		'<td><button type="button" onclick="remove()" class="btn btn-danger">X</button></td>' +
		'</tr>');

	var valorFinal = 0;
	$( ".precoCompra" ).each(function() {
      	valorFinal += parseFloat($( this ).text());
    });
	$( "#total" ).text('R$ ' + valorFinal);
	$( "#valorFinal" ).val(valorFinal);

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

function remove(){
	$( "#linha" ).remove();
	
	var valorFinal = 0;
	$( ".precoCompra" ).each(function() {
      	valorFinal += parseFloat($( this ).text());
    });
	$( "#total" ).text('R$ ' + valorFinal);
	$( "#valorFinal" ).val(valorFinal);
}