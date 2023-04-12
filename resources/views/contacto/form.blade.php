@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'contacto/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner4.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>{{ $modo }} Contacto</h2>                       
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
                        <form action="{{ asset('/Contacto/create/') }}" method="post">
                            @csrf
                            <div class="form row">

                               
                                        <input hidden="true" readonly class="form-control" type="text" name="volatil" value="{{ isset($volatil)?$volatil:old('volatil') }}" id="volatil"><br>
                                        <input hidden="true" readonly class="form-control" type="text" name="tipo" value="{{ isset($tipo)?$tipo:old('tipo') }}" id="tipo"><br>
                                   

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="correo">Correo</label>
                                        <input class="form-control" type="email" name="correo" value="{{ isset($contacto->correo)?$contacto->correo:old('correo') }}" id="correo"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="telefono">Teléfono</label>
                                        <input class="form-control" type="text" required name="telefono" onkeypress="return valideKey(event);" minlength="10" maxlength="12" value="{{ isset($contacto->telefono)?$contacto->telefono:old('telefono') }}" id="telefono"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="celular">Celular</label>
                                        <input class="form-control" type="text" required name="celular"  onkeypress="return valideKey(event);" minlength="10" maxlength="12" value="{{ isset($contacto->celular)?$contacto->celular:old('celular') }}" id="celular"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="otro">Otro</label>
                                        <input class="form-control" type="text" required  name="otro" onkeypress="return valideKey(event);" minlength="10" maxlength="12" value="{{ isset($contacto->otro)?$contacto->otro:old('otro') }}" id="otro"><br>
                                    </div>
                                </div>

                               
                            </div>
                            <input type="submit" value="{{ $modo }} Datos" class="btn btn-success">
                                <a href="{{ url('contacto/') }}" class="btn btn-primary">Regresar</a>
                            <br>
                        </div>
                        
                            </form>


            </div>
            </div>

            @endsection

            @section('js')

            <script type="text/javascript">
                function valideKey(evt){
                    
                    // code is the decimal ASCII representation of the pressed key.
                    var code = (evt.which) ? evt.which : evt.keyCode;
                    
                    if(code==8) { // backspace.
                    return true;
                    } else if(code>=48 && code<=57) { // is a number.
                    return true;
                    } else{ // other keys.
                    return false;
                    }
                }
</script> 
@endsection