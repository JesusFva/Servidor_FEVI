@extends('layouts.main', [
'class' => '',
'elementActive' => 'calificacion'
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
                    <h2 class="card-title">Calificaciones</h2>               
                </div>
            </div>


<form action="{{ url('/index_calificacion') }}" method="post" enctype="multipart/form-data">
    @csrf
    
    <div class="col-md-4 mb-3">
        @if($vol == 0)
        <label for="sParcial">PARCIAL A CONSULTAR: </label>
        @else
        <label for="sParcial">PARCIAL A CONSULTAR: {{ $parcial }} </label>
        @endif
            <select name="sParcial" id="sParcial" class="form-control" aria-label="Default select example" require="true">
                <option selected value="SELECCIONE">-- Seleccione el Parcial --</option>
                <option value="PRIMER PARCIAL">PRIMER PARCIAL</option>
                <option value="SEGUNDO PARCIAL">SEGUNDO PARCIAL</option>
                <option value="TERCER PARCIAL">TERCER PARCIAL</option>
                <option value="CALIFICACION FINAL">CALIFICACIÓN FINAL</option>
            </select>
    </div>
    <input hidden="true" class="form-control" type="text" name="vol" value="1" id="vol">

    <button hidden="true" id="btn_accion">Acción</button>
</form>


<!-- Card header -->

    <div class="card-header border-0">
        <div class="row">
        @foreach($grupo_materias as $grupo_materia)
        <div class="card m-2 shadow" style="width: 22rem; ">
                <div class="card-body" align="center">
                @foreach($materias as $materia)
                @foreach($grupos as $grupo)
                @if(($materia->id == $grupo_materia->id_materia) and ($grupo->id == $grupo_materia->id_grupo))
                    <h4 class="card-title text-center">{{ $materia->nombre }}  </h4>
                    <h6 class="card-subtitle text-center mb-2 text-muted">{{ $grupo->nombre }} </h6>
                    <form action="{{ url('/createcal') }}" method="post" enctype="multipart/form-data">
                    @csrf

                        <input hidden="true" class="form-control" type="text" name="id_grupo_materia" value="{{ $grupo_materia->id }}" id="id_grupo_materia">  
                        <input hidden="true" class="form-control" type="text" name="id_materia" value="{{ $materia->id }}" id="id_materia">
                        <input hidden="true" class="form-control" type="text" name="id_grupo" value="{{ $grupo->id }}" id="id_grupo">
                        <input hidden="true" class="form-control" type="text" name="vol" value="0" id="vol">
                        <input type="submit" value="Ver Alumnos" class="btn btn-primary" style="background-color:#008a8a">
                        </form> 

                        <form action="{{ url('/downloadCalificaciones') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input hidden="true" class="form-control" type="text" name="id_grupo_materia" value="{{ $grupo_materia->id }}" id="id_grupo_materia">
                        <input hidden="true" class="form-control" type="text" name="id_materia" value="{{ $materia->id }}" id="id_materia">
                        <input hidden="true" class="form-control" type="text" name="id_grupo" value="{{ $grupo->id }}" id="id_grupo">
                        <input hidden="true" class="form-control" type="text" name="vol" value="1" id="vol">
                        @if($vol !=0)
                            <input hidden="true" type="text" name="parcial" value="{{$parcial}}" id="parcial" class="form-control">
                        @endif
                        <input type="submit" value="Ver Calificaciones" class="btn btn-primary" style="background-color:#008a8a">   
                    </form>
                        <form action="{{ url('/downloadFormatoCalificaciones') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <input hidden="true" class="form-control" type="text" name="vol" value="1" id="vol">
                        <input hidden="true" class="form-control" type="text" name="id_grupo_materia" value="{{ $grupo_materia->id }}" id="id_grupo_materia">
                        <input hidden="true" class="form-control" type="text" name="id_materia" value="{{ $materia->id }}" id="id_materia">
                        <input hidden="true" class="form-control" type="text" name="id_grupo" value="{{ $grupo->id }}" id="id_grupo">
                        @if($vol !=0)
                            <input hidden="true" type="text" name="parcial" value="{{$parcial}}" id="parcial" class="form-control">
                        @endif
                        <input type="submit" value="Ver PDF" class="btn btn-primary" style="background-color:#008a8a">
                    </form>

                        
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