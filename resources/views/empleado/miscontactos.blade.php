@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/create'
])

@section('content')
<div class="container">
    <br><br><br>
    <h4>Bienvenido {{ auth()->user()->name }} </h4>

    <div class="form-group">

    <label for="correo">{{ $contacto->correo }}</label><br>
    <label for="telefono">{{ $contacto->telefono }}</label><br>
    <label for="celular">{{ $contacto->celular }}</label><br>

    <label ></label><br>
    </div>
    <a href="{{ url('dash/') }}" class="btn btn-primary">Regresar</a>

</div>
@endsection