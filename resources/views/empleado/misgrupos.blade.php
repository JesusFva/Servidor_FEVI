@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/create'
])

@section('content')
<div class="container">
    <br><br><br>
    <h4>Bienvenido {{ auth()->user()->name }} </h4>


    
    <div class="form-group">
    <label for="">Tus grupos</label><br>
    <select class="form-select" aria-label="Default select example" name="id_cuatrimestre" id="id_cuatrimestre">
        
    <option value="">-- Selecciona el Grupo --</option>
    @foreach($grupos as $grupo)

    <option value="">{{ $grupo->nombre }}</option>
      
    @endforeach
    
    </select>
    
    <a href="{{ url('#') }}" class="btn btn-primary">Evaluar</a>
    <a href="{{ url('#') }}" class="btn btn-primary">Pasar lista</a>


    </div>
    <a href="{{ url('dash/') }}" class="btn btn-primary">Regresar</a>

</div>
@endsection