@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'referencia_alumno'
])

@section('content')
<div class="container">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
   
        {{ Session::get('mensaje') }}
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<br><br><br>
<a href="{{ url('referencia_alumno/create') }}" class="btn btn-success">Registrar nueva referencia del alumno</a><br><br>
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
        </tr>
    </thead>
    <tbody>
        @foreach($referencia_alumno as $referencia_alumno)
        <tr>
            <td>{{ $referencia_alumno->id }}</td>

            <td>{{ $referencia_alumno->nombre }}</td>
            <td>{{ $referencia_alumno->ap_m }}</td>
            <td>
            <a href="{{ url('/referencia_alumno/'.$referencia_alumno->id.'/edit') }}" class="btn btn-warning">
                    Editar
            </a>    
             |
            
            <form action="{{ url('/referencia_alumno/'.$referencia_alumno->id) }}" method="post" class="d-inline">
            @csrf
            {{ method_field('DELETE') }}    
                <input type="submit" value="Borrar" onclick="return confirm('¿Deseas borrar?')" class="btn btn-danger">

            </form>
            
            </td>
           
        </tr>
        @endforeach
    </tbody>
</table>
{!! $referencia_alumno->links() !!}
</div>

@endsection