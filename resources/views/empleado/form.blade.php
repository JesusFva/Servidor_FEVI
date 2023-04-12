@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'domicilio/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner6.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>{{ $modo }} Empleado</h2>                       
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
                        <form action="{{ asset('/Empleado/create/') }}" method="post">
                            @csrf
                            <div class="form row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input class="form-control" type="text" name="nombre" onkeypress="return soloLetras(event)" value="{{ isset($empleado->nombre)?$empleado->nombre:old('nombre') }}" id="nombre"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ap_paterno">Apellido Paterno</label>
                                        <input class="form-control" type="text" name="ap_paterno" onkeypress="return soloLetras(event)" value="{{ isset($empleado->ap_paterno)?$empleado->ap_paterno:old('ap_paterno') }}" id="ap_paterno"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ap_materno">Apellido Materno</label>
                                        <input class="form-control" type="text" name="ap_materno" onkeypress="return soloLetras(event)" value="{{ isset($empleado->ap_materno)?$empleado->ap_materno:old('ap_materno') }}" id="ap_materno"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="curp">CURP</label>
                                        <input class="form-control" type="text" style="text-transform:uppercase;" name="curp" minlength="18" maxlength="18" value="{{ isset($empleado->curp)?$empleado->curp:old('curp') }}" id="curp"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="n_cedula">Cédula Profesional</label>
                                        <input class="form-control" type="text" name="n_cedula" value="{{ isset($empleado->n_cedula)?$empleado->n_cedula:old('n_cedula') }}" id="n_cedula"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="n_empleado">No. Empleado</label>
                                        <input class="form-control" type="text" name="n_empleado" value="{{ isset($empleado->n_empleado)?$empleado->n_empleado:old('n_empleado') }}" id="n_empleado"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="rfc">RFC</label>
                                        <input class="form-control" type="text" name="rfc" minlength="13" maxlength="13" value="{{ isset($empleado->rfc)?$empleado->rfc:old('rfc') }}" id="rfc"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="f_nacimiento">Fecha Nacimiento</label>
                                        <input class="form-control" type="date" name="f_nacimiento" value="{{ isset($empleado->f_nacimiento)?$empleado->f_nacimiento:old('f_nacimiento') }}" id="f_nacimiento"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="f_ingreso">Fecha Ingreso</label>
                                        <input class="form-control" type="date" name="f_ingreso" value="{{ isset($empleado->f_ingreso)?$empleado->f_ingreso:old('f_ingreso') }}" id="f_ingreso"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="f_baja">Fecha Baja</label>
                                        <input class="form-control" type="date" name="f_baja" value="{{ isset($empleado->f_baja)?$empleado->f_baja:old('f_baja') }}" id="f_baja"><br>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="estatus">Estatus</label>
                                            <select name="estatus" id="estatus" class="form-control" >

                                                <option value="default">-- Seleccione el estatus --</option>

                                                <option selected="true" value="{{ isset($empleado->estatus)?$empleado->estatus:old('estatus') }}" >{{ isset($empleado->estatus)?$empleado->estatus:old('estatus') }}</option>                        

                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="BAJA">BAJA</option>
                                                <option value="TEMPORAL">TEMPORAL</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="profesion">Grado Académico</label>
                                            <select name="profesion" id="profesion" class="form-control">

                                                <option value="default">-- Seleccione el grado académico --</option>

                                                <option selected="true" value="{{ isset($empleado->profesion)?$empleado->profesion:old('profesion') }}" >{{ isset($empleado->profesion)?$empleado->profesion:old('profesion') }}</option>                        
                                                
                                                <option value="Bachillerato Técnico">Bachillerato Técnico</option>
                                                <option value="TSU">Técnico Superior Universitario</option>
                                                <option value="Licenciatura/Ingeniería">Licenciatura/Ingeniería</option>
                                                <option value="Especialidad">Especialidad</option>
                                                <option value="Maestría">Maestría</option>
                                                <option value="Doctorado">Doctorado</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="puesto">Puesto</label>
                                            <select class="form-control" aria-label="Default select example" name="id_puesto" id="id_puesto">

                                                <option value="">-- Seleccione el puesto --</option>
                                                @foreach ($puestos as $puesto)
                                                @if($vol != 0)
                                                @if($puesto->id == $empleado->id_puesto)
                                                <option value="{{$puesto->id}}" selected> {{ $puesto->nombre_puesto }}</option>
                                                @else
                                                <option value="{{$puesto->id}}"> {{ $puesto->nombre_puesto }}</option>
                                                @endif
                                                @else
                                                <option value="{{$puesto->id}}"> {{ $puesto->nombre_puesto }}</option>
                                                @endif

                                                @endforeach
                                            </select>
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br>

                                    <div class="container-input">
                                        <input type="file" name="url_foto" id="url_foto"  class="inputfile inputfile-1" multiple="" accept="image/jpeg, image/png"/>
                                            <label for="url_foto">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
                                                <span class="iborrainputfile">Seleccionar fotografía</span>
                                            </label>
                                    </div>
                                                    <div class=" img-fluid img-circle" style="margin-top:-30px; margin-left: 210px;">
                                                        @if(isset($empleado->url_foto))
                                                            <img src="{{ asset('fotos'.'/'.$empleado->url_foto) }}" alt="foto personal" width="100" class="img-thumbnail img-fluid">
                                                        @endif
                                                        <img src="" width="150px" height="120px" id="imagenmuestra">
                                                    </div>
                                                    
                                                </div>  
                                            </div>
                                        <br>

                                           <!--  @if(isset($empleado->url_foto))
                                            <img src="{{ asset('fotos'.'/'.$empleado->url_foto) }}" alt="" width="100" class="img-thumbnail img-fluid">
                                            @endif
                                            <input class="form-control" type="file" name="url_foto" value="" id="url_foto"><br> -->
                                

                               
                            </div>
                            <input type="submit" value="{{ $modo }} Datos" class="btn btn-success">
                                <a href="{{ url('empleado/') }}" class="btn btn-primary">Regresar</a>
                            <br>
                        </div>
                        
                            </form>


            </div>
            </div>

            @endsection
           

@section('js')

<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
            // Asignamos el atributo src a la tag de imagen
            $('#imagenmuestra').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // El listener va asignado al input
    $("#url_foto").change(function() {
        readURL(this);
    });

    function soloLetras(e) {
        var key = e.keyCode || e.which,
        tecla = String.fromCharCode(key).toLowerCase(),
        letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
        especiales = [8, 37, 39, 46],
        tecla_especial = false;

            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                break;
                }
            }

        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
        return false;
        }
  }


</script>

@endsection