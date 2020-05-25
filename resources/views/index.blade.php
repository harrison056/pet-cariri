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
            <th>Data</th>
            <th>Hora</th>
        </thead>
        <tbody>
            @foreach ($agenda as $agendas)
                <tr>
                    <td>{{ $agendas->animal->cliente->nome }}</td>
                    <td>{{ $agendas->animal->nome }}</td>
                    <td>{{ date( 'd/m/Y' , strtotime($agendas->data) ) }}</td>
                    <td>{{ $agendas->hora }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection