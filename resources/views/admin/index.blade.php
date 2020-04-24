@extends('adminlte::page')

@section('content')

<div class="row">	
	<div class="col-md-8">
		<a href="/register"><button class="btn btn-primary">Cadastar novo usuário	</button></a>
	</div>
</div>
<br>
@foreach($user as $users)

<div class="box box-success">
	<div class="card card-primary">
		
		<div class="card-header">
			<h3>{{$users->name}}</h3>
		</div>

		<div class="box-body">
    		<div class="col-md-8">
    			<ul>
					<strong>Email</strong> {{$users->email}}
					<p><strong>Adicionado em: </strong> {{date("d/m/Y H:i", strtotime($users->created_at))}}</p>	
				</ul>
    		</div>

		</div>
		
        
    </div>

    <div class="box-body">
    	<div class="col-md-8">
    		
    	</div>

	</div>
</div>


@endforeach

@endsection