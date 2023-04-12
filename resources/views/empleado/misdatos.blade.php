@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/create'
])

@section('content')
<div class="container">
    <br><br><br>
    <h4>Bienvenido {{ auth()->user()->name }} </h4>

    <div class="form-group">

    <label for="correo">{{ $empleado->nombre }}</label><br>
    <label for="correo">{{ $empleado->ap_paterno }}</label><br>
    <label for="correo">{{ $empleado->ap_materno }}</label><br>
    <label for="correo">{{ $empleado->curp }}</label><br>
    <label for="correo">{{ $empleado->g_academico }}</label><br>
    <img src="{{ asset('images'.'/'.$empleado->url_foto) }}" alt="" width="100" height="100" class="img-thumbnail img-fluid">    

    <label ></label><br>
    </div>
    <a href="{{ url('dash/') }}" class="btn btn-primary">Regresar</a>

</div>
@endsection