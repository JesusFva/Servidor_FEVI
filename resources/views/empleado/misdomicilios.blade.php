@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/create'
])

@section('content')
<div class="container">
    <br><br><br>
    <h4>Bienvenido {{ auth()->user()->name }} </h4>

    <div class="form-group">

    <label for="calle">{{ $domicilio->calle }}</label><br>
    <label for="colonia">{{ $domicilio->colonia }}</label><br>
    <label for="municipio">{{ $domicilio->municipio }}</label><br>
    <label for="estado">{{ $domicilio->estado }}</label><br>
    <label for="cp">{{ $domicilio->cp }}</label><br>
  

    <label ></label><br>
    </div>
    <a href="{{ url('dash/') }}" class="btn btn-primary">Regresar</a>

</div>
@endsection