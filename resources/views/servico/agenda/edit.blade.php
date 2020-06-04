@extends('adminlte::page')

@section('title', 'PetCariri - Agenda')

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
                <div class="row">
                    <div class="col-sm-2"> 
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                    
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default">Apagar visita</button>
                </div>
                
		    </div>
        </div>
	</div>

</form>

<!-- /.modal Excluir cliente-->

      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <h4 class="modal-title">Fechar Agendamento</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Fechar agendamento?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Não</button>
              <form method="POST" action="{{action('AgendarServicoController@destroy', $agenda->id)}}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-outline-light">Sim</button>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
<!-- /.modal -->


@endsection