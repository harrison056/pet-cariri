@extends('adminlte::page')

@section('content')

<div class="card card-info">
		<div class="card-header">
		</div>
		<div class="card-body">
			<h4>{{ $agenda->animal->cliente->nome }}</h4>
			<h5>{{ $agenda->animal->nome }} - {{ $agenda->animal->raca }}</h5>
			<h5>{{ $agenda->servico }}</h5>
			<h5>{{ date( 'd/m/Y' , strtotime($agenda->data) ) }} - {{ $agenda->hora }}</h5>
			<div class="custom-control custom-checkbox">
                <input class="custom-control-input" name="status" type="checkbox" id="customCheckbox1" value="1">
                <label for="customCheckbox1" class="custom-control-label">Pagamento realizado</label>
            </div>
            <br>
			<div class="form-group row">
				<div class="col-md-2">
	        		<div class="col-md-10">
	        			<button type="submit" class="btn btn-primary">Atualizar</button>
		 			</div>
	    		</div>
	    	</div>	
			
		</div>
</div>
@endsection