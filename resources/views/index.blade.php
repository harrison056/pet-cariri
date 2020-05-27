@extends('adminlte::page')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
@endif

<div class="row">
    <!-- Card cliente -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>{{ count($cliente) }}</h3>
                <p>Clientes Registrados</p>
        </div>
            <div class="icon">
                <i class="fas fa-fw fa-users"></i>
            </div>
            <a href="/cliente" class="small-box-footer">Ver todos <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-1 col-6">
        
    </div>
    <!-- Card Venda -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ count($venda) }}</h3>
                <p>Compras realizadas</p>
            </div>
        <div class="icon">
            <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
            <a href="/venda/create" class="small-box-footer">Ir para nova compra <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-1 col-6">
        
    </div>
    <!-- Card estoque -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-default">
            <div class="inner">
                <h3>{{ count($produto) }}</h3>
                <p>Estoque</p>
        </div>
            <div class="icon">
                <i class="fa fa-archive"></i>
            </div>
            <a href="/produto" class="small-box-footer">Ver Estoque <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>


<div class="card card-info">
        <div class="card-header">
            <div class="row">
                <div class="col-sm-10">
                    <h3 class="box-title"><b>Agenda do dia</b></h3>
                </div>
                <div class="col-sm-2">
                    <a href="/agenda"><p>Ver todos</p></a>
                </div>
                </div>
        </div>

        <div class="card-body">
            @if( !isset ( $agenda ) )
            <p>Não há agenda para hoje...</p>
            @else          
            <div class="box box-primary">
                <table class="table table-hover table-bordered">
                    <thead>
                        <th>Cliente</th>
                        <th>Animal</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th>Status Pagamento</th>
                    </thead>
                    <tbody>
                        @foreach ($agenda as $agendas)
                            <tr onclick="location.href = '/agenda/{{ $agendas->id }}/edit';" style="cursor: hand;">
                                <td>{{ $agendas->animal->cliente->nome }}</td>
                                <td>{{ $agendas->animal->nome }}</td>
                                <td>{{ $agendas->servico }}</td>
                                <td>{{ date( 'd/m/Y' , strtotime($agendas->data) ) }}</td>
                                <td>{{ $agendas->hora }}</td>
                                @if( $agendas->status == 1 )
                                <td>Realizado</td>
                                @else
                                <td>Não realizado</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif 
            </div>
            
        </div>
</div>
   
@endsection