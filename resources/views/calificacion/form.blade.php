@extends('layouts.main', [
'class' => '',
'elementActive' => 'calificacion/save_cal'
])
<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
    <script type="text/javascript">

        $(document).ready( function() {

            $('#sParcial').change(function() {
            if ($(this).val() != 'SELECCIONE') {
                //$parcialalv = $( "#sParcial" ).val();
                //$("#parcial").val($parcialalv);
                $('#btn_accion').trigger('click');
            }
        });
        });
        

        </script>
@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner16.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
   
        <p style="font-size: 15px; color: black;"> {{ Session::get('mensaje') }} </p>
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card-body shadow" >
            <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 
                <div class="col text-center">
                    <h3>Fecha: {{ $fecha_ac }} -------------- Grupo: {{ $nombre_grupo }} -------------- Materia: {{ $codigo_materia }} </h3>
                </div>
            </div>

    
    <form action="{{ url('/send_partial') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    <div class="col-md-4 mb-3">
        @if($vol == 0)
        <label for="sParcial">PARCIAL A EVALUAR: </label>
        @else
        <label for="sParcial">PARCIAL A EVALUAR: {{ $parcial }} </label>
        @endif
            <select name="sParcial" id="sParcial" class="form-control" aria-label="Default select example" require="true">
                <option selected value="SELECCIONE">-- Seleccione el Parcial --</option>
                <option value="PRIMER PARCIAL">PRIMER PARCIAL</option>
                <option value="SEGUNDO PARCIAL">SEGUNDO PARCIAL</option>
                <option value="TERCER PARCIAL">TERCER PARCIAL</option>
            </select>
            <br>
    </div>
    <input hidden="true" type="text" name="id_grupo_materia" value="{{$id_grupo_materia}}" id="id_grupo_materia" class="form-control">
    <input hidden="true" type="text" name="id_grupo" value="{{$id_grupo}}" id="id_grupo" class="form-control">
    <input hidden="true" type="text" name="id_materia" value="{{$id_materia}}" id="id_materia" class="form-control">
    <button hidden="true" id="btn_accion">Acción</button>
</form>


<div class="table-responsive" style="overflow: hidden">
    <table id="tbasignados" class="table table-bordered table-hover dt-responsive nowrap display" style="width:100%">
            <thead style="background-color: #008a8a">
                    <tr>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Alumnos
                        </th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Asistencia %
                        </th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Presenciales %
                        </th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Plataforma %
                        </th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Examen
                        </th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Calificación
                        </th>
                        
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">
                            Registrar
                        </th>
                    </tr>
                </thead>
                <tbody>
                @if($vol != 0)
                    <tr>
                        @foreach($alumnos as $alumno)
                        <form action="{{ url('/save_all') }}" method="post" enctype="multipart/form-data" class="d-inline form-registrar">
                            @csrf
                           <tr>
                            <td class="budget text-center">
                                {{$alumno->nombre}} {{$alumno->ap_p}} {{$alumno->ap_m}}
                            </td>

                            <td>
                            <input class="form-control" type="asis_porcentaje" name="asis_porcentaje" value="" id="asis_porcentaje"  require="true">
                            </td>

                            <td>
                            <input class="form-control" type="pres_porcentaje" name="pres_porcentaje" value="" id="pres_porcentaje"  require="true">
                            </td>

                            <td>
                            <input class="form-control" type="plat_porcentaje" name="plat_porcentaje" value="" id="plat_porcentaje"  require="true">
                            </td>

                            <td>
                            <input class="form-control" type="exa_porcentaje" name="exa_porcentaje" value="" id="exa_porcentaje"  require="true">
                            </td>

                            <td>
                            <input hidden="true" type="text" name="id_alumno" value="{{$alumno->id}}" id="id_alumno" class="form-control">
                            <input  hidden="true" type="text" name="id_grupo_materia" value="{{$id_grupo_materia}}" id="id_grupo_materia" class="form-control">
                            @if($vol !=0)
                            <input hidden="true" type="text" name="parcial" value="{{$parcial}}" id="parcial" class="form-control">
                            @endif
                            <input  class="form-control" type="calificacion" name="calificacion" value="" id="calificacion" require="true">
                            <input hidden="true" type="text" name="fecha" value="{{ $fecha_ac }}" id="fecha" class="form-control">
                            </td> 
                            <td class="budget text-center">
                                <input type="submit" value="Guardar" class="btn btn-primary">
                            </td>
                        </tr>
                        </form>
                    @endforeach
                   @else
                        <h3>¡Seleccione el parcial para ver a los alumnos!</h3>
                   @endif
                </tbody>

            </table>
        </div>
   

    <a href="{{ url('calificacion/') }}" class="btn btn-primary">Regresar</a>
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
                        title: 'Calificación registrada',
                        showConfirmButton: false,
                        timer: 1500
                        })
            this.submit();
        }
    );


</script>

@endsection

