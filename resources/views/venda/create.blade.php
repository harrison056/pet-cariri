@extends('adminlte::page')

@section('content')

<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>


<div class="card card-info">
	<div class="card-header">
		<h4 class="box-title"><b>Add Produto</b></h4>
	</div>

	<div class="card-body">
		<div class="form-group row">
            <label class="col-sm-1 col-form-label">Produto</label>
            <div class="col-sm-3">
            	<select name="servico_id" class="form-control" id="produto">
                    <option disabled selected>------</option>
                    @foreach($produto as $produtos)
                        <option value="{{$produtos->id}}">{{$produtos->nome}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-1">
            </div>	
            
            <label class="col-sm-1.5 col-form-label" for="qtd">Quantidade</label>
            <div class="col-sm-1">
            	<input type="number" class="form-control" id="qtd" placeholder="0">
            </div>
            
            <div class="col-sm-1">
            </div>

            <label class="col-sm-1.5 col-form-label" for="qtd">Preço Unitário</label>
            <div class="col-sm-1">
            	<input class="form-control" id="preco" disabled>
            </div>

        </div>

	 	<div class="card-body">
	 		<button onclick='add()' type="submit" class="btn btn-primary">Add</button>
	 	</div>       

	</div>	
</div>

<div class="box box-primary">
	<table class="table table-hover table-bordered">
	    <thead>
	        <th>Produto</th>
	        <th>Quantidade</th>
	        <th>Preço</th>
	        <th>-</th>
	    </thead>
    </table>
</div>



<script type="text/javascript">
	
	function add(){
		console.log($('#produto option:selected').val());
		console.log($('#produto option:selected').text());
		console.log($('#qtd').val());
		console.log($('#preco').val());

		$('#produto').val('');
		$('#qtd').val('');
	}

</script>

@endsection