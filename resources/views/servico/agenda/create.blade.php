@extends('adminlte::page')

@section('title', 'PetCariri - Agenda')

@section('content')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{url('js/agenda.js')}}"></script>

@if($message = Session::get('danger'))
    <div class="alert alert-danger">
        {{$message}}
    </div>
@endif

<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{action('AgendarServicoController@store')}}">
@csrf

	<div class="card card-info">
		<div class="card-header">
			<h3>Nova visita</h3>
		</div>

		<div class="card-body">

    		<! -- Campo Data -->
    		<div class="form-group row">
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Data</label>
            	<div class="col-sm-8">
            		<input name="data" type="date" class="form-control" id="inputEmail3">
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
            	<label for="inputEmail3" class="col-sm-1 col-form-label">Serviço</label>
            	<div class="col-sm-8">
            		<select name="servico" class="form-control" id="servico">
                        <option disabled selected>------</option>
                        @foreach($servico as $servicos)
                            <option value="{{$servicos->id}}">{{$servicos->nome}}</option>
                        @endforeach
                    </select>
            	</div>
            </div>
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-1 col-form-label">Preço</label>
                <div class="col-sm-2">
                    <input class="form-control" id="preco_view" disabled>
                </div>
            </div>
            <div class="form-group row">
               <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" id="status" type="checkbox" name="status" value="1">
                    <label for="status" class="custom-control-label">Pagamento realizado</label>
                </div>
            </div>    
            

            <input type="hidden" name="animal_id" id="animal_id" value="{{$a->id}}">
            <input type="hidden" name="servico_id" id="servico_id">
            <input type="hidden" id="preco" name="preco">
            

            <div class="form-group row">
		    	<button type="submit" class="btn btn-primary">Adicionar</button>
		    </div>
        </div>
	</div>

</form>
@endsection