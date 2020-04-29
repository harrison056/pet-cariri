@extends('layouts.app')

@section('content')
<a class="dropdown-item" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"><h3>
        Click aqui</a> para continuar! </h3>
@endsection