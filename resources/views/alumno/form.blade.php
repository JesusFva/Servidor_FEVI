@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner13.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>Ficha de inscripción</h2>                       
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
                        <form action="{{ asset('/Alumno/create/') }}" method="post">
                            @csrf
                            <div class="form row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input class="form-control" type="nombre" name="nombre" onkeypress="return soloLetras(event)" value="{{ isset($alumno->nombre)?$alumno->nombre:old('nombre') }}" id="nombre"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ap_p">Apellido Paterno</label>
                                        <input class="form-control" type="ap_p" name="ap_p" onkeypress="return soloLetras(event)" value="{{ isset($alumno->ap_p)?$alumno->ap_p:old('ap_p') }}" id="ap_p"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ap_m">Apellido Materno</label>
                                        <input class="form-control" type="ap_m" name="ap_m" onkeypress="return soloLetras(event)" value="{{ isset($alumno->ap_m)?$alumno->ap_m:old('ap_m') }}" id="ap_m"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="f_nacimiento">Fecha de Nacimiento</label>
                                        <input class="form-control" type="date" name="f_nacimiento" value="{{ isset($alumno->f_nacimiento)?$alumno->f_nacimiento:old('f_nacimiento') }}" id="f_nacimiento"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nacionalidad">Nacionalidad</label>
                                            <select name="nacionalidad" id="nacionalidad" class="form-control">

                                                    <option selected="true" value="{{ isset($alumno->nacionalidad)?$alumno->nacionalidad:old('nacionalidad') }}"> {{ isset($alumno->nacionalidad)?$alumno->nacionalidad:old('nacionalidad') }} </option>
                                                    <option value="default">-- Seleccione la Nacionalidad --</option>

                                                    <option class="list" value="Mexicano(a)">Mexicano(a)</option>

                                                    <option class="list" value="Afgano(a)">Afgano(a)</option>
                                                    <option class="list" value="Alemán(a)">Alemán(a)</option>
                                                    <option class="list" value="Árabe">Árabe</option>
                                                    <option class="list" value="Argentino(a)">Argentino(a)</option>
                                                    <option class="list" value="Australiano(a)">Australiano(a)</option>
                                                    <option class="list" value="Belga">Belga</option>
                                                    <option class="list" value="Boliviano(a)">Boliviano(a)</option>
                                                    <option class="list" value="Brasileño(a)">Brasileño(a)</option>
                                                    <option class="list" value="Camboyano(a)">Camboyano(a)</option>
                                                    <option class="list" value="Canadiense">Canadiense</option>
                                                    <option class="list" value="Chileno(a)">Chileno(a)</option>
                                                    <option class="list" value="Chino(a)">Chino(a)</option>
                                                    <option class="list" value="Colombiano(a)">Colombiano(a)</option>
                                                    <option class="list" value="Coreano(a)">Coreano(a)</option>
                                                    <option class="list" value="Costarricense">Costarricense</option>
                                                    <option class="list" value="Cubano(a)">Cubano(a)</option>
                                                    <option class="list" value="Danés(a)">Danés(a)</option>
                                                    <option class="list" value="Ecuatoriano(a)">Ecuatoriano(a)</option>
                                                    <option class="list" value="Egipcio(a)">Egipcio(a)</option>
                                                    <option class="list" value="Salvadoreño(a)">Salvadoreño(a)</option>
                                                    <option class="list" value="Escocés(a)">Escocés(a)</option>
                                                    <option class="list" value="Español(a)">Español(a)</option>
                                                    <option class="list" value="Estadounidense">Estadounidense</option>
                                                    <option class="list" value="Estonio(a)">Estonio(a)</option>
                                                    <option class="list" value="Etiope">Etiope</option>
                                                    <option class="list" value="Filipino(a)">Filipino(a)</option>
                                                    <option class="list" value="Finlandés(a)">Finlandés(a)</option>
                                                    <option class="list" value="Francés(a)">Francés(a)</option>
                                                    <option class="list" value="Galés(a)">Galés(a)</option>
                                                    <option class="list" value="Griego(a)">Griego(a)</option>
                                                    <option class="list" value="Guatemalteco(a)">Guatemalteco(a)</option>
                                                    <option class="list" value="Haitiano(a)">Haitiano(a)</option>
                                                    <option class="list" value="Holandés(a)">Holandés(a)</option>
                                                    <option class="list" value="Hondureño(a)">Hondureño(a)</option>
                                                    <option class="list" value="Indonés(a)">Indonés(a)</option>
                                                    <option class="list" value="Inglés(a)">Inglés(a)</option>
                                                    <option class="list" value="Iraquí">Iraquí</option>
                                                    <option class="list" value="Iraní">Iraní</option>
                                                    <option class="list" value="Irlandés(a)">Irlandés(a)</option>
                                                    <option class="list" value="Israelí">Israelí</option>
                                                    <option class="list" value="Italiano(a)">Italiano(a)</option>
                                                    <option class="list" value="Japonés(a)">Japonés(a)</option>
                                                    <option class="list" value="Jordano(a)">Jordano(a)</option>
                                                    <option class="list" value="Laosiano(a)">Laosiano(a)</option>
                                                    <option class="list" value="Letón(a)">Letón(a)</option>
                                                    <option class="list" value="Letonés(a)">Letonés(a)</option>
                                                    <option class="list" value="Malayo(a)">	Malayo(a)</option>
                                                    <option class="list" value="Marroquí(a)">Marroquí(a)</option>
                                    
                                                    <option class="list" value="Nicaragüense">Nicaragüense</option>
                                                    <option class="list" value="Noruego(a)">Noruego(a)</option>
                                                    <option class="list" value="Neozelandés(a)">Neozelandés(a)</option>
                                                    <option class="list" value="Panameño(a)">Panameño(a)</option>
                                                    <option class="list" value="Paraguayo(a)">Paraguayo(a)</option>
                                                    <option class="list" value="Peruano(a)">Peruano(a)</option>
                                                    <option class="list" value="Polaco(a)">Polaco(a)</option>
                                                    <option class="list" value="Portugués(a)">Portugués(a)</option>
                                                    <option class="list" value="Puertorriqueño(a)">Puertorriqueño(a)</option>
                                                    <option class="list" value="Dominicano(a)">Dominicano(a)</option>
                                                    <option class="list" value="Rumano(a)">Rumano(a)</option>
                                                    <option class="list" value="Ruso(a)">Ruso(a)</option>
                                                    <option class="list" value="Sueco(a)">Sueco(a)</option>
                                                    <option class="list" value="Suizo(a)">Suizo(a)</option>
                                                    <option class="list" value="Tailandés(a)">Tailandés(a)</option>
                                                    <option class="list" value="Taiwanes(a)">Taiwanes(a)</option>
                                                    <option class="list" value="Turco(a)">Turco(a)</option>
                                                    <option class="list" value="Ucraniano(a)">Ucraniano(a)</option>
                                                    <option class="list" value="Uruguayo(a)">Uruguayo(a)</option>
                                                    <option class="list" value="Venezolano(a)">Venezolano(a)</option>
                                                    <option class="list" value="Vietnamita(a)">Vietnamita(a)</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="seguro_social">Sexo</label>
                                            <select name="seguro_social" id="seguro_social" class="form-control">

                                                <option selected="true" value="{{ isset($alumno->seguro_social)?$alumno->seguro_social:old('seguro_social') }}"> {{ isset($alumno->seguro_social)?$alumno->seguro_social:old('seguro_social') }} </option>
                                                <option value="default">-- Seleccione el Sexo --</option>

                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tipo_sanguineo">Tipo sanguíneo</label>
                                            <select name="tipo_sanguineo" id="tipo_sanguineo" class="form-control">

                                                <option selected="true" value="{{ isset($alumno->tipo_sanguineo)?$alumno->tipo_sanguineo:old('tipo_sanguineo') }}"> {{ isset($alumno->tipo_sanguineo)?$alumno->tipo_sanguineo:old('tipo_sanguineo') }} </option>
                                                <option value="default">-- Seleccione el Tipo Sanguíneo --</option>

                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="matricula">Matrícula</label>
                                        <input class="form-control" type="matricula" name="matricula" value="{{ isset($alumno->matricula)?$alumno->matricula:old('matricula') }}" id="matricula"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="curp">CURP</label>
                                        <input class="form-control" style="text-transform:uppercase;" type="texto" name="curp" minlength="18" maxlength="18" value="{{ isset($alumno->curp)?$alumno->curp:old('curp') }}" id="curp"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="estado_civil">Estado civil</label>
                                            <select name="estado_civil" id="estado_civil" class="form-control">

                                                <option selected="true" value="{{ isset($alumno->estado_civil)?$alumno->estado_civil:old('estado_civil') }}"> {{ isset($alumno->estado_civil)?$alumno->estado_civil:old('estado_civil') }} </option>
                                                <option value="default">-- Seleccione el Estado Civil --</option>

                                                <option class="list" value="Soltero(a)">Soltero(a)</option>
                                                <option class="list" value="Casado(a)">Casado(a)</option>
                                                <option class="list" value="Divorciado(a)">Divorciado(a)</option>
                                                <option class="list" value="Separado(a)">Separado(a)</option>
                                                <option class="list" value="Viudo(a)">Viudo(a)</option>
                                                <option class="list" value="Unión libre">Unión libre</option>
                                            </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="enfermedad">Enfermedad / Limitación física/ Alergia </label>
                                        <input class="form-control" type="enfermedad" name="enfermedad" value="{{ isset($alumno->enfermedad)?$alumno->enfermedad:old('enfermedad') }}" id="enfermedad"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="modalidad">Modalidad</label>
                                            <select name="modalidad" id="modalidad" class="form-control">

                                                <option selected="true" value="{{ isset($alumno->modalidad)?$alumno->modalidad:old('modalidad') }}"> {{ isset($alumno->modalidad)?$alumno->modalidad:old('modalidad') }} </option>
                                                <option value="default">-- Seleccione la Modalidad --</option>
                                                
                                                <option value="MIXTO">MIXTO</option>
                                                <option value="NO ESCOLARIZADO">NO ESCOLARIZADO</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="status">Estatus</label>
                                            <select name="status" id="status" class="form-control">

                                                <option selected="true" value="{{ isset($alumno->status)?$alumno->status:old('status') }}"> {{ isset($alumno->status)?$alumno->status:old('status') }} </option>
                                                <option value="default">-- Seleccione el Estatus --</option>
                                               
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="BAJA">BAJA</option>
                                                <option value="TEMPORAL">TEMPORAL</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="no_cuatrimestre">Cuatrimestre</label>
                                            <select name="no_cuatrimestre" id="no_cuatrimestre" class="form-control">

                                                <option selected="true" value="{{ isset($alumno->no_cuatrimestre)?$alumno->no_cuatrimestre:old('no_cuatrimestre') }}"> {{ isset($alumno->no_cuatrimestre)?$alumno->no_cuatrimestre:old('no_cuatrimestre') }} </option>
                                                <option value="default">-- Seleccione el Cuatrimestre --</option>

                                                <option value="1RO">PRIMER CUATRIMESTRE</option>
                                                <option value="2DO">SEGUNDO CUATRIMESTRE</option>
                                                <option value="3RO">TERCER CUATRIMESTRE</option>
                                                <option value="4TO">CUARTO CUATRIMESTRE</option>
                                                <option value="5TO">QUINTO CUATRIMESTRE</option>
                                                <option value="6TO">SEXTO CUATRIMESTRE</option>
                                                <option value="7TO">SEPTIMO CUATRIMESTRE</option>
                                                <option value="8VO">OCTAVO CUATRIMESTRE</option>
                                                <option value="9NO">NOVENO CUATRIMESTRE</option>
                                            </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="f_ingreso">Fecha de Ingreso</label>
                                        <input class="form-control" type="date" name="f_ingreso" value="{{ isset($alumno->f_ingreso)?$alumno->f_ingreso:old('f_ingreso') }}" id="f_ingreso"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="f_egreso">Fecha de Egreso</label>
                                        <input class="form-control" type="date" name="f_egreso" value="{{ isset($alumno->f_egreso)?$alumno->f_egreso:old('f_egreso') }}" id="f_egreso"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="grupo">Grupo</label>
                                            <select class="form-control" name="id_grupo" id="id_grupo">

                                                <option value="">Selecciona Grupo</option>
                                                @foreach ($grupos as $grupo)
                                                @if($vol != 0)
                                                @if($grupo->id == $alumno->id_grupo)
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
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="Carrera">Carrera</label>
                                            <select class="form-control" name="id_carrera" id="id_carrera">

                                                <option value="">Selecciona Carrera</option>
                                                @foreach ($carreras as $carrera)
                                                @if($vol != 0)
                                                @if($carrera->id == $alumno->id_carrera)
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
                                        <label for="plantel">Plantel</label>
                                            <select class="form-control" name="id_plantel" id="id_plantel">

                                                <option value="">Selecciona Plantel</option>
                                                @foreach ($plantels as $plantel)
                                                @if($vol != 0)
                                                @if($plantel->id == $alumno->id_plantel)
                                                <option value="{{$plantel->id}}" selected> {{ $plantel->nombre }}</option>
                                                @else
                                                <option value="{{$plantel->id}}"> {{ $plantel->nombre }}</option>
                                                @endif
                                                @else
                                                <option value="{{$plantel->id}}"> {{ $plantel->nombre }}</option>
                                                @endif

                                                @endforeach

                                            </select>
                                    </div>
                                </div>


                                <div class="col-md-3">
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
                                                        @if(isset($alumno->url_foto))
                                                            <img src="{{ asset('fotos'.'/'.$alumno->url_foto) }}" alt="foto alumno" width="100" class="img-thumbnail img-fluid">
                                                        @endif
                                                        <img src="" width="150px" height="120px" id="imagenmuestra">
                                                    </div>
                                                    
                                                </div>  
                                            </div>
                                        <br>
                            </div>
                            <input type="submit" value="Siguiente" class="btn btn-success">
                                <a href="{{ url('alumno/') }}" class="btn btn-primary">Regresar</a>
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