@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'referencia_alumno/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner14.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>Referencia del alumno</h2>                       
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
                        <form action="{{ asset('/Refer/create/') }}" method="post">
                            @csrf
                            <div class="form row">

                                <div class="col-md-3">
                                    <div class="form-group">

                                        
                                        <input hidden="true" readonly class="form-control" type="text" name="id_alumno" value="{{ isset($id_alumno)?$id_alumno:old('id_alumno') }}" id="id_alumno">

                                        <label for="nombre">Nombre</label>
                                        <input class="form-control" type="nombre" name="nombre" onkeypress="return soloLetras(event)" value="{{ isset($referencia_alumno->nombre)?$referencia_alumno->nombre:old('nombre') }}" id="nombre"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ap_p">Apellido Paterno</label>
                                        <input class="form-control" type="ap_p" name="ap_p" onkeypress="return soloLetras(event)" value="{{ isset($referencia_alumno->ap_p)?$referencia_alumno->ap_p:old('ap_p') }}" id="ap_p"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ap_m">Apellido Materno</label>
                                        <input class="form-control" type="ap_m" name="ap_m" onkeypress="return soloLetras(event)" value="{{ isset($referencia_alumno->ap_m)?$referencia_alumno->ap_m:old('ap_m') }}" id="ap_m"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tel_casa">Teléfono de casa</label>
                                        <input class="form-control" type="number" name="tel_casa" value="{{ isset($referencia_alumno->tel_casa)?$referencia_alumno->tel_casa:old('tel_casa') }}" id="tel_casa"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="tel_celular">Teléfono celular</label>
                                        <input class="form-control" type="tel_celular" name="tel_celular" value="{{ isset($referencia_alumno->tel_celular)?$referencia_alumno->tel_celular:old('tel_celular') }}" id="tel_celular"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="correo">Correo electrónico</label>
                                        <input class="form-control" type="email" name="correo" value="{{ isset($referencia_alumno->correo)?$referencia_alumno->correo:old('correo') }}" id="correo"><br>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="direccion">Dirección</label>
                                        <input class="form-control" type="direccion" name="direccion" value="{{ isset($referencia_alumno->direccion)?$referencia_alumno->direccion:old('direccion') }}" id="direccion"><br>
                                    </div>
                                </div>

                                </div>
                            <input type="submit" value="Registrar" class="btn btn-success">
                                <a href="{{ url('referencia_alumno/') }}" class="btn btn-primary">Regresar</a>
                            <br>
                        </div>
                        
                            </form>


            </div>
            </div>

@endsection

@section('js')

<script type="text/javascript">

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



