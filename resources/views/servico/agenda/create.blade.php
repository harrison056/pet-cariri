@extends('adminlte::page')

@section('content')

<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{action('AgendarServicoController@store')}}">
@csrf

	<div class="card card-info">
		<div class="card-header">
			<h3>Alterar dados do cliente</h3>
		</div>

		<div class="card-body">

    		<! -- Campo Data -->
    		<div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Data</label>
            	<div class="col-sm-8">
            		<input name="data" class="form-control" id="inputEmail3">
            	</div>
            </div>

            <! -- Campo Hora -->
    		<div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Hora</label>
            	<div class="col-sm-8">
            		<input name="hora" type="time" class="form-control" id="inputEmail3">
            	</div>
            </div>

            <! -- Campo serviço -->
    		<div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">serv</label>
            	<div class="col-sm-8">
            		<input name="servico_id" id="servico_id" class="form-control" id="inputEmail3">
            	</div>
            </div>

            <input type="hidden" name="animal_id" id="animal_id" value="{{$a->id}}">

            <div class="form-group row">
		    	<button type="submit" class="btn btn-primary">Adicionar</button>
		    </div>
        </div>
	</div>

</form>
@endsection