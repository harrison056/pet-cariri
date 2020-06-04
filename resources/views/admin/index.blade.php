@extends('adminlte::page')

@section('content')

<div class="row">	
	<div class="col-md-8">
		<a href="/register"><button class="btn btn-primary">Cadastar novo usuário	</button></a>
	</div>
</div>
<br>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Usuários Cadastrados</h3>

        <div class="card-tools">
            <span class="badge badge-primary">{{ count($user) }}  Usuários</span>
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
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
</div>


@endsection