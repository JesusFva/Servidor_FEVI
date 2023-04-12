@extends('layouts.main', [
'class' => '',
'elementActive' => 'asistencia/downloadAsistencia'
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
                <div class="col text-center">
                    <h2 class="card-title">Reporte de Asistencias</h2>  
                </div>
              </div>

    <div class="row">
        <div class="col-12">
            <h3> Grupo: {{ $nombre_grupo }} </h3>
        </div>
        
        <div class="col-12">

        <form action="{{ url('/downloadAsistencia') }}" method="post" enctype="multipart/form-data">
        @csrf
                
                <input hidden="true" id="id_grupo" type="text" name="id_grupo" value="{{$id_grupo}}" class="form-control mr-2">
                <input hidden="true" id="id_materia" type="text" name="id_materia" value="{{$id_materia}}" class="form-control mr-2">
                <input hidden="true" id="id_grupo_materia" type="text" name="id_grupo_materia" value="{{$id_grupo_materia}}" class="form-control mr-2">
                
                <br>
                <input type="submit" value="Consultar" class="btn btn-primary">
        </form>

        <form action="{{ url('/downloadFormatoAsistencia') }}" method="post" enctype="multipart/form-data">
        @csrf
        <br>
                <input hidden="true" id="id_grupo" type="text" name="id_grupo" value="{{$id_grupo}}" class="form-control mr-2">
                <input hidden="true" id="id_materia" type="text" name="id_materia" value="{{$id_materia}}" class="form-control mr-2">
                <input hidden="true" id="id_grupo_materia" type="text" name="id_grupo_materia" value="{{$id_grupo_materia}}" class="form-control mr-2">
                <input type="submit" value="Ver PDF" class="btn btn-primary">
        </form>

        </div>
        </div>
        <div class="table-responsive" style="overflow: hidden">
               <table id="tbasignados" class="table table-bordered table-hover dt-responsive nowrap display" style="width:100%">
                    <thead style="background-color: #008a8a">
                        <tr>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget"> Alumnos</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <tr>
                            <td class="budget text-center">
                            @foreach($alumnos as $alumno)
                                {{$alumno->nombre}} {{$alumno->ap_p}} {{$alumno->ap_m}}
                            @endforeach
                            </td>
                            </tr>

                        </tr>

                    </tbody>
                </table>
                </div>
                <a href="{{ url('asistencia/') }}" class="btn btn-primary">Regresar</a>
    </div>
</div>
@endsection