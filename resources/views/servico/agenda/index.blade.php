@extends('adminlte::page')

@section('content')

@if($message = Session::get('success'))
	<div class="alert alert-success">
		{{$message}}
	</div>
@endif

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
</div>



@endsection