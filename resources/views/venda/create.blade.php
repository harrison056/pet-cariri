@extends('adminlte::page')

@section('content')
<style type="text/css">
	#teste{
		color: red;
	}
</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<script type="text/javascript" src="{{url('js/funcoes.js')}}"></script>


<div class="card card-info">
	<div class="card-header">
		<h4 class="box-title"><b>Add Produto</b></h4>
	</div>

	<div class="card-body">
		<div class="form-group row">
            <label class="col-sm-1 col-form-label">Produto</label>
            <div class="col-sm-3">
            	<select name="produto" class="form-control" id="produto">
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
            	<input class="form-control" name="preco" id="preco" disabled>
            </div>

        </div>
        <p id="teste"></p>
	 	<div class="card-body">
	 		<button onclick='add()' type="submit" class="btn btn-primary">Add</button>
	 	</div>       

	</div>	
</div>

<div class="box box-primary">
	<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{url('venda')}}">
	@csrf	
		<table class="table table-hover table-bordered">
		    <thead>
		        <th>Produto</th>
		        <th>Quantidade</th>
		        <th>Preço</th>
		    </thead>

		    <tbody id="carrinho">
		    	
		    </tbody>
		    <tbody>
		    	<tr>
		    		<td><b>Total</b></td>
		    		<td id="total"></td>
		    	</tr>
		    </tbody>
	    </table>
	    <p id="teste"></p>
	    <button type="submit" class="btn btn-info">Finalizar compra</button>
	</form>
</div>



@endsection