@extends('adminlte::page')

@section('content')

<div class="row">	
	<div class="col-md-8">
		<a href="/register"><button class="btn btn-primary">Cadastar novo usuário	</button></a>
	</div>
</div>
<br>


<div class="box box-primary">
    <table class="table table-hover table-bordered">
        <thead>
            <th>Nome</th>
            <th>Email</th>
            <th>Adicionado em</th>
        </thead>
        <tbody>
            @foreach($user as $users)
                <tr>
                    <td>{{$users->name}}</td>
                    <td>{{$users->email}}</td>
                    <td>{{date("d/m/Y H:i", strtotime($users->created_at))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection