$(document).ready(function(){
	$('#servico').change(function(){
		var idServico = $(this).val();
		
		$.get('/agenda/get-preco/' + idServico, function(preco){
			$('#preco').val(preco);
			$('#preco_view').val('R$ ' + preco);
		});

		$.get('/agenda/get-servico/' + idServico, function(servico){
			$('#servico_id').val(servico);
		});
	});
});