@extends('adminlte::page')

@section('title', 'PetCariri - Vacinas')

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Vacinas - {{$a->nome}}</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
    	<button type="button" class="btn outline-btn-info" data-toggle="modal" data-target="#modal-info"><b>+</b> Adicionar vacina</button>	
    	@if( count( $vacina ) > 0 )
    	<table class="table table-hover table-bordered">
    		<thead>
                <th>Vacina</th>
                <th>Data</th>
            </thead>
            <tbody>
				@foreach ($vacina as $vacinas)
	            	<td>{{ $vacinas->nome }}</td>
	            	<td>{{ date( 'd/m/Y' , strtotime($vacinas->data) ) }}</td>
	            @endforeach
            </tbody>
    	</table>
    	@else
	        <center><p>Não há vacinas cadastradas!</p></center>
	    @endif	
    </div>
</div>

<!-- /.modal -->

      <div class="modal fade" id="modal-info">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Adicionar Vacina</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form method="POST" action="{{action('VacinaController@store')}}">
            @csrf
            	<div class="modal-body">
            		<! -- Nome -->
					<div class="form-group row">
			        	<label for="inputEmail3" class="col-sm-2 col-form-label">Vacina</label>
			            	<div class="col-sm-6">
			            		<input name="nome" class="form-control">
			            	</div>
			        </div>
			        <! -- Campo Data -->
		    		<div class="form-group row">
		            	<label for="inputEmail3" class="col-sm-2 col-form-label">Data</label>
		            	<div class="col-sm-6">
		            		<input name="data" type="date" class="form-control">
		            	</div>
		            </div>
		            <input type="hidden" name="animal_id" value="{{ $a->id }}">
            	</div>
	            <div class="modal-footer justify-content-between">
		              <button type="button" class="btn btn-defaul" data-dismiss="modal">Fechar</button>
						<button type="submit" class="btn btn-primary">Cadastar</button>
				</div>
			</form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


     	

@endsection