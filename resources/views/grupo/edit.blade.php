@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'grupo/edit'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-color: #94E6D4;">
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
             <div class="card-body shadow" >
              <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 
                <div class="col text-center">
                    <h2>Editar Grupo</h2>                       
                  </div>
              </div>



        @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                <li> {{$error}} </li>
                @endforeach
            </ul>
        </div>

        @endif

            <div class="card-body border-primary">
            <form action="{{ url('/Grupo/update/'.$grupo->id) }}" method="post">
                @csrf
                <div class="form row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="nombre" name="nombre" value="{{ isset($grupo->nombre)?$grupo->nombre:old('nombre') }}" id="nombre"><br>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="turno">Turno</label>
                            <input class="form-control" type="turno" name="turno" value="{{ isset($grupo->turno)?$grupo->turno:old('turno') }}" id="turno"><br>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="nivel_academico">Nivel Académico</label>
                                <select name="nivel_academico" id="nivel_academico" class="form-control">

                                    <option value="default">-- Seleccione el nivel educativo --</option>

                                    <option selected="true" value="{{ isset($grupo->nivel_academico)?$grupo->nivel_academico:old('nivel_academico') }}" >{{ isset($grupo->nivel_academico)?$grupo->nivel_academico:old('nivel_academico') }}</option>                        

                                    <option value="Licenciatura">Licenciatura</option>
                                    <option value="Ingeniería">Ingeniería</option>
                                    <option value="Especialidad">Especialidad</option>
                                    <option value="Maestría">Maestría</option>
                                    <option value="Doctorado">Doctorado</option>
                                </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estatus">Estatus</label>
                                <select name="estatus" id="estatus" class="form-control">

                                    <option value="default">-- Seleccione el estatus --</option>

                                    <option selected="true" value="{{ isset($grupo->estatus)?$grupo->estatus:old('estatus') }}" >{{ isset($grupo->estatus)?$grupo->estatus:old('estatus') }}</option>                        

                                    <option value="Activo">Activo</option>
                                    <option value="Inactivo">Inactivo</option>
                                </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="carrera">Carrera</label>
                                <select class="form-control" name="id_carrera" id="id_carrera">

                                    <option value="">-- Seleccione la carrera --</option>
                                    @foreach ($carreras as $carrera)
                                    @if($vol != 0)
                                    @if($carrera->id == $grupo->id_carrera)
                                    <option value="{{$carrera->id}}" selected> {{ $carrera->nombre }}</option>
                                    @else
                                    <option value="{{$carrera->id}}"> {{ $carrera->nombre }}</option>
                                    @endif
                                    @else
                                    <option value="{{$carrera->id}}"> {{ $carrera->nombre }}</option>
                                    @endif

                                    @endforeach

                                </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cuatrimestre">Cuatrimestre</label>
                                <select class="form-control" aria-label="Default select example" name="id_cuatrimestre" id="id_cuatrimestre">

                                    <option value="">-- Seleccione el Cuatrimestre --</option>
                                    @foreach ($cuatrimestres as $cuatrimestre)
                                    @if($vol != 0)
                                    @if($cuatrimestre->id == $grupo->id_cuatrimestre)
                                    <option value="{{$cuatrimestre->id}}" selected> {{ $cuatrimestre->periodo }}</option>
                                    @else
                                    <option value="{{$cuatrimestre->id}}"> {{ $cuatrimestre->periodo }}</option>
                                    @endif
                                    @else
                                    <option value="{{$cuatrimestre->id}}"> {{ $cuatrimestre->periodo }}</option>
                                    @endif

                                    @endforeach

                                </select>
                        </div>
                    </div>

                </div>
                <input type="submit" value="Guardar cambios" class="btn btn-success">
                    <a href="{{ url('grupo/') }}" class="btn btn-primary">Regresar</a>
                <br>
            </div>
            
                </form>
</div>
</div>

@endsection
