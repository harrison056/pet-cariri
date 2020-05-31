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
        <div class="small-box bg-default">
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

    <!-- Card Sem -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>+</h3>
                <p>Adicionar Cliente</p>
        </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="/cliente/create" class="small-box-footer">Ver Estoque <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <!-- Card estoque -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
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
</div>



<div class="card">
    <div class="card-header">
        <h3 class="card-title">Agenda do dia</h3>

        <div class="card-tools">
            <span class="badge badge-danger">{{ count($agenda) }}  Atendimentos</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
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
    </div>
    <!-- /.card-body -->
    <div class="card-footer text-center">
        <a href="/agenda">Ver todos os horários</a>
    </div>
</div>

<br><br><br><br>

<footer class="page-footer bg-default">
    <center>
        <img src="img/petpqn.png">
    </center>
</footer>

@endsection