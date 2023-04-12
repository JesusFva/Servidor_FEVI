@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'materia/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner12.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>Asignar Materia - Profesor - Grupo</h2>                       
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
            <form action="{{ asset('/Asigmat/create/') }}" method="post">
                @csrf
                <div class="form row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="profesor">Profesor</label>
                                <select class="form-control" aria-label="Default select example" name="id_empleado" id="id_empleado">
                                    <option value="">-- Seleccione el profesor --</option>
                                    @foreach ($empleados as $empleado)
                                    @if($vol != 0)
                                    @if($empleado->id == $grupo_materia->id_empleado)
                                    <option value="{{$empleado->id}}" selected> {{ $empleado->nombre }}  {{ $empleado->ap_paterno }} {{ $empleado->ap_materno }}</option>
                                    @else
                                    <option value="{{$empleado->id}}"> {{ $empleado->nombre }} {{ $empleado->ap_paterno }} {{ $empleado->ap_materno }}</option>
                                    @endif
                                    @else
                                    <option value="{{$empleado->id}}"> {{ $empleado->nombre }} {{ $empleado->ap_paterno }} {{ $empleado->ap_materno }}</option>
                                    @endif

                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="materia">Materia</label>
                                <select class="form-control" aria-label="Default select example" name="id_materia" id="id_materia">
                                    <option value="">-- Seleccione la materia --</option>
                                    @foreach ($materias as $materia)
                                    @if($vol != 0)
                                    @if($materia->id == $grupo_materia->id_materia)
                                    <option value="{{$materia->id}}" selected> {{ $materia->nombre }}</option>
                                    @else
                                    <option value="{{$materia->id}}"> {{ $materia->nombre }}</option>
                                    @endif
                                    @else
                                    <option value="{{$materia->id}}"> {{ $materia->nombre }}</option>
                                    @endif

                                    @endforeach
                                </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="grupo">Grupo</label>
                                <select class="form-control" aria-label="Default select example" name="id_grupo" id="id_grupo">
                                    <option value="">-- Seleccione el grupo --</option>
                                    @foreach ($grupos as $grupo)
                                    @if($vol != 0)
                                    @if($grupo->id == $grupo_materia->id_grupo)
                                    <option value="{{$grupo->id}}" selected> {{ $grupo->nombre }}</option>
                                    @else
                                    <option value="{{$grupo->id}}"> {{ $grupo->nombre }}</option>
                                    @endif
                                    @else
                                    <option value="{{$grupo->id}}"> {{ $grupo->nombre }}</option>
                                    @endif

                                    @endforeach
                                </select>
                        </div>
                        <br>
                    </div>
                </div>
                <input type="submit" value="{{ $modo }} Datos" class="btn btn-success">
                    <a href="{{ url('grupo_materia/') }}" class="btn btn-primary">Regresar</a>
                <br>
            </div>
            
                </form>
</div>
</div>

@endsection


