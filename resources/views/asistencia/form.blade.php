@extends('layouts.main', [
'class' => '',
'elementActive' => 'asistencia/save_ass'
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
<div class="card-body shadow" >
              <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 
                <div class="col text-left">
                    <h2>Fecha: {{ $fecha_ac }}</h2>                
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


    @if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
   
        <p style="font-size: 15px; color: black;"> {{ $mensaje }} </p>
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
    
     <div class="table-responsive" style="overflow: hidden">
               <table id="tbasignados" class="table table-bordered table-hover dt-responsive nowrap display" style="width:100%">
                    <thead style="background-color: #008a8a">
                    <tr>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Alumnos
                        </th>
                            <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Estatus
                        </th>
                        |<th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Registrar
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        @foreach($alumnos as $alumno)
                        <form action="{{ url('/save_ass') }}" method="POST" enctype="multipart/form-data" class="d-inline form-registrar">
                        
                            @csrf
                            <input hidden="true" type="text" name="grupoId" value="{{ $grupoId }}" id="grupoId" class="form-control">
                            <td class="budget text-center">
                                {{$alumno->nombre}} {{$alumno->ap_p}} {{$alumno->ap_m}}
                            </td>
                            <td class="budget text-center">

                                <input hidden="true" type="text" name="id_alumno" value="{{ $alumno->id }}" id="id_alumno" class="form-control">
                                <input hidden="true" type="text" name="id_grupo_materia" value="{{ $grupo_materiaId }}" id="id_grupo_materia" class="form-control">

                                <select class="form-control" name="id_tipo_asistencia" id="id_tipo_asistencia">
                                    <option value="">-- Seleccione estatus --</option>
                                    @foreach ($tipo_asistencias as $tipo_asistencia)
                                    @if($vol != 0)
                                    @foreach($asistencias as $asistencia)
                                    @if($tipo_asistencia->id == $asistencia->id_tipo_asistencia)
                                    <option value="{{$tipo_asistencia->id}}" selected> {{ $tipo_asistencia->tipo }}</option>
                                    @else
                                    <option value="{{$tipo_asistencia->id}}"> {{ $tipo_asistencia->tipo }}</option>
                                    @endif
                                    @endforeach
                                    @else
                                    <option value="{{$tipo_asistencia->id}}"> {{ $tipo_asistencia->tipo }}</option>
                                    @endif

                                    @endforeach
                                </select>

                            </td>
                           <!-- <div class="col-12">
                                <div class="form-inline mb-2">
                                    <label for="fecha">Fecha: &nbsp;</label>
                                    <input type="date" name="fecha" value="{{ $fecha_ac }}" id="fecha" class="form-control">
                                </div>
                            </div>!-->
                            <td class="budget text-center">
                                <input type="submit" value="Registrar" class="btn btn-primary">
                            </td>
                    </tr>
                    <input hidden="true" type="text" name="fecha" value="{{ $fecha_ac }}" id="fecha" class="form-control">
                    </form>
                    @endforeach
                </tbody>

            </table>
        </div>
  

    <a href="{{ url('asistencia/') }}" class="btn btn-primary">Regresar</a>
    <br>
    </div>
</div>
@endsection

@section('js')

<script type="text/javascript">

$('.form-registrar').submit(
        function (e){
            Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Asistencia registrada',
                        showConfirmButton: false,
                        timer: 1500
                        })
            this.submit();
        }
    );


</script>

@endsection