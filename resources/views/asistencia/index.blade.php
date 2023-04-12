@extends('layouts.main', [
'class' => '',
'elementActive' => 'asistencia'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner15.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-md-12 {{ $class ?? '' }}" >
               <br><br><br><br><br><br>
            </div>
        </div>
    </div>
</div> 

<div class="content">

@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
   
        <p style="font-size: 15px; color: black;"> {{ Session::get('mensaje') }} </p>
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    <br><br><br>

    <div class="card-body shadow" >
            <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 
                <div class="col text-center">
                    <h2 class="card-title">Módulo de Asistencia</h2>                
                </div>
            </div>

            <div class="col text-left">
                    <h4> {{ $mensaje }} </h4>         
            </div>

    <!-- Card header -->
   
    <div class="card-header border-0">
        <div class="row">
        @foreach($grupo_materias as $grupo_materia)
        <div class="card m-2 shadow" style="width: 25rem;">
                <div class="card-body"  align="center">
                @foreach($materias as $materia)
                @foreach($grupos as $grupo)
                @if(($materia->id == $grupo_materia->id_materia) and ($grupo->id == $grupo_materia->id_grupo))
                    <h4 class="card-title text-center">{{ $materia->nombre }}  </h4>
                    <h6 class="card-subtitle text-center mb-2 text-muted">{{ $grupo->nombre }} </h6>
                
                    <form action="{{ url('/create') }}" method="post" enctype="multipart/form-data">
                    @csrf

                        <input hidden="true" class="form-control" type="text" name="materiaId" value="{{ $materia->id }}" id="materiaId">
                        <input hidden="true" class="form-control" type="text" name="grupoId" value="{{ $grupo->id }}" id="grupoId">
                        <input hidden="true" class="form-control" type="text" name="empleadoId" value="{{ $grupo_materia->id_empleado }}" id="empleadoId">
                        <input hidden="true" class="form-control" type="text" name="grupo_materiaId" value="{{ $grupo->id }}" id="grupo_materiaId">
                        <input type="submit" value="Ver Alumnos" class="btn btn-primary" style="background-color:#008a8a">
                    </form> 
                    
                    <a href="{{ url('/view_report/'.$grupo_materia->id) }}" class="btn btn-primary" style="background-color:#008a8a">Reporte de asistencia</a>
                    <br><br><br>
                    @endif
                        @endforeach
                        @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
</div>
@endsection
