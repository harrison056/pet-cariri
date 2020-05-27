@extends('adminlte::page')

@section('content')

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="{{url('js/agenda.js')}}"></script>

<form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{action('AgendarServicoController@update', $id)}}">
@csrf
<input type="hidden" name="_method" value="PATCH">
	<div class="card card-info">
		<div class="card-header">
			<h3>Editar visita</h3>
		</div>

		<div class="card-body">

            <div class="row">
                <div class="col-sm-6">
                    <h4>{{ $agenda->animal->cliente->nome }}</h4>
                </div>
                <h5>Serviço: {{ $agenda->servico }}</h5> 
            </div>
           <div class="row">
            <div class="col-sm-6">
               <h5>{{ $agenda->animal->nome }} - {{ $agenda->animal->raca }}</h5>
            </div>   
               <h5>Preço: R$ {{ $agenda->preco }}</h5>
           </div>

           <br>
    		
    		<div class="form-group row">
                <! -- Campo Data -->
            	<label for="inputEmail3" class="col-sm-0 col-form-label">Data</label>
            	<div class="col-sm-3">
            		<input name="data" type="date" class="form-control" id="inputEmail3" value="{{$agenda->data}}">
            	</div>
                <div class="col-sm-1"></div>
                <! -- Campo Hora -->
                <label for="inputEmail3" class="col-sm-0 col-form-label">Hora</label>
                <div class="col-sm-3">
                    <input name="hora" type="time" class="form-control" id="inputEmail3" value="{{$agenda->hora}}">
                </div>
            </div>

            <div class="form-group body">
               <div class="custom-control custom-checkbox">
                    @if( $agenda->status == 1 )
                    <input class="custom-control-input" name="status" type="checkbox" id="customCheckbox1" value="1" checked>
                    @else
                    <input class="custom-control-input" name="status" type="checkbox" id="customCheckbox1" value="1">
                    @endif
                    <label for="customCheckbox1" class="custom-control-label">Pagamento realizado</label>
                </div>
            </div> 
            
            <div class="form-group footer">
		    	<button type="submit" class="btn btn-primary">Atualizar</button>
		    </div>
        </div>
	</div>

</form>
@endsection