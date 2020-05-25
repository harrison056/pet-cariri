$('#servico').change(function(){
	console.log('foi');
	$("#preco").val($(this).val());
});