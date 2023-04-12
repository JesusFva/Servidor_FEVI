@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'domicilio/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner5.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>{{ $modo }} Domicilio</h2>                       
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
                        <form action="{{ asset('/Domicilio/create/') }}" method="post">
                            @csrf
                            <div class="form row">

                               
                                        <input hidden="true" readonly class="form-control" type="text" name="volatil" value="{{ isset($volatil)?$volatil:old('volatil') }}" id="volatil"><br>
                                        <input hidden="true" readonly class="form-control" type="text" name="tipo" value="{{ isset($tipo)?$tipo:old('tipo') }}" id="tipo"><br>
                                   
                         

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="validationCustom01">Calle</label>
                                        <input class="form-control" type="text" name="calle" value="{{ isset($domicilio->calle)?$domicilio->calle:old('calle') }}" id="calle"><br>
                                          
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom02">No. Exterior</label>
                                      <input class="form-control" type="text" name="no_exterior" value="{{ isset($domicilio->no_exterior)?$domicilio->no_exterior:old('no_exterior') }}" id="no_exterior">
                                        
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom02">No. Interior</label>
                                      <input class="form-control" type="text" name="no_interior" value="{{ isset($domicilio->no_interior)?$domicilio->no_interior:old('no_interior') }}" id="no_interior">
                                         
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom02">Código Postal</label>
                                      <input class="form-control" type="text  " name="cp" onfocusout="obtenercp();" onkeypress="return valideKey(event);" minlength="5" maxlength="5" value="{{ isset($domicilio->cp)?$domicilio->cp:old('cp') }}" id="cp"><br>
                                         
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="estado">Estado</label>
                                          <select name="estado" class="form-control" id="estado">
                                              <option selected="true" value="{{ isset($domicilio->estado)?$domicilio->estado:old('estado') }}" >{{ isset($domicilio->estado)?$domicilio->estado:old('estado') }}</option>
                                          </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="validationCustom03">Municipio</label>
                                          <select name="municipio" class="form-control" id="municipio">
                                              <option selected="true" value="{{ isset($domicilio->municipio)?$domicilio->municipio:old('municipio') }}" >{{ isset($domicilio->municipio)?$domicilio->municipio:old('municipio') }}</option>
                                          </select>
                                        <!-- <input class="form-control" type="text" name="municipio" value="{{ isset($domicilio->municipio)?$domicilio->municipio:old('municipio') }}" id="municipio"><br> -->
                                         
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom03">Colonia</label>
                                          <select name="colonia" class="form-control" id="colonia">
                                              <option selected="true" value="{{ isset($domicilio->colonia)?$domicilio->colonia:old('colonia') }}" >{{ isset($domicilio->colonia)?$domicilio->colonia:old('colonia') }}</option>
                                          </select>
                                      
                                          
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom03">Descripción</label>
                                      <input class="form-control" type="text" name="descripcion" value="{{ isset($domicilio->descripcion)?$domicilio->colonia:old('descripcion') }}" id="descripcion"><br>
                                         
                                         
                                    </div>
                                </div>


                         
                               
                            </div>
                            <input type="submit" value="{{ $modo }} Datos" class="btn btn-success">
                                <a href="{{ url('domicilio/') }}" class="btn btn-primary">Regresar</a>
                            <br>
                        </div>
                        
                            </form>


            </div>
            </div>

            @endsection

@section('js')

<script type="text/javascript">

  function obtenercp() {

    var cpselec = $('input[name="cp"]').val();

        $.get('/Codigos/lista/'+cpselec, function (data) {
          var html = '<option value="default">-- Seleccione el Estado --</option>';
            for (var i=0; i<data.length; i++)
            html += '<option value=" '+data[i].estado+' "> '+data[i].estado+' </option>'
              console.log(html);
              $('#estado').html(html);
        });

        $.get('/Codigos/lista/'+cpselec, function (data) {
          var html = '<option value="default">-- Seleccione el Municipio --</option>';
            for (var i=0; i<data.length; i++)
            html += '<option value=" '+data[i].municipio+' "> '+data[i].municipio+' </option>'
              console.log(html);
              $('#municipio').html(html);
        });

        $.get('/Codigos/lista_col/'+cpselec, function (data) {
          var html = '<option value="default">-- Seleccione la Colonia --</option>';
            for (var i=0; i<data.length; i++)
            html += '<option value=" '+data[i].colonia+' "> '+data[i].colonia+' </option>'
              console.log(html);
              $('#colonia').html(html);
        });
  }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
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