@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'domicilio/edit'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-color: #94E6D4;">
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
                    <h2>Editar Domicilio</h2>                       
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
                        <form action="{{ url('/Domicilio/update/'.$domicilio->id) }}" method="post">
                            @csrf
                            <div class="form row">

                               
                                        <input hidden="true" readonly class="form-control" type="text" name="volatil" value="{{ isset($volatil)?$volatil:old('volatil') }}" id="volatil"><br>
                                        <input hidden="true" readonly class="form-control" type="text" name="tipo" value="{{ isset($tipo)?$tipo:old('tipo') }}" id="tipo"><br>
                                   
                          <form class="needs-validation" novalidate>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="validationCustom01">Calle</label>
                                        <input class="form-control" type="text" name="calle" value="{{ isset($domicilio->calle)?$domicilio->calle:old('calle') }}" id="calle"><br>
                                          <div class="valid-feedback">
                                              Correcto
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom02">No. Exterior</label>
                                      <input class="form-control" type="number" name="no_exterior" value="{{ isset($domicilio->no_exterior)?$domicilio->no_exterior:old('no_exterior') }}" id="no_exterior">
                                          <div class="valid-feedback">
                                              Correcto
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom02">No. Interior</label>
                                      <input class="form-control" type="number" name="no_interior" value="{{ isset($domicilio->no_interior)?$domicilio->no_interior:old('no_interior') }}" id="no_interior">
                                          <div class="valid-feedback">
                                              Correcto
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom02">CP</label>
                                      <input class="form-control" type="number  " name="cp" value="{{ isset($domicilio->cp)?$domicilio->cp:old('cp') }}" id="cp"><br>
                                          <div class="valid-feedback">
                                              Correcto
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="estado">Estado</label>
                                          <select name="estado" id="estado" class="form-control" aria-label="Default select example">
                                            <option selected value="{{ isset($domicilio->estado)?$domicilio->estado:old('estado') }}">{{ isset($domicilio->estado)?$domicilio->estado:old('estado') }}-- Selecciona el Estado --</option>
                                            <option value="AGUASCALIENTES">AGUASCALIENTES</option>
                                            <option value="BAJACALIFORNIA">BAJA CALIFORNIA</option>
                                            <option value="BAJACALIFORNIASUR">BAJA CALIFORNIA SUR</option>
                                            <option value="CAMPECHE">CAMPECHE</option>
                                            <option value="CHIAPAS">CHIAPAS</option>
                                            <option value="CHIHUAHUA">CHIHUAHUA</option>
                                            <option value="COAHUILA">COAHUILA</option>
                                            <option value="COLIMA">COLIMA</option>
                                            <option value="CIUDADEMEXICO">CIUDAD DE MÉXICO</option>
                                            <option value="DURANGO">DURANGO</option>
                                            <option value="ESTADODEMEXICO">ESTADO DE MÉXICO</option>
                                            <option value="GUANAJUATO">GUANAJUATO</option>
                                            <option value="GUERRERO">GUERRERO</option>
                                            <option value="HIDALGO">HIDALGO</option>
                                            <option value="JALISCO">JALISCO</option>
                                            <option value="MICHOACAN">MICHOACÁN</option>
                                            <option value="MORELOS">MORELOS</option>
                                            <option value="NAYARIT">NAYARIT</option>
                                            <option value="NUEVOLEON">NUEVO LEÓN</option>
                                            <option value="OAXACA">OAXACA</option>
                                            <option value="PUEBLA">PUEBLA</option>
                                            <option value="QUERETARO">QUERÉTARO</option>
                                            <option value="QUINTANAROO">QUINTANA ROO</option>
                                            <option value="SLP">SAN LUIS POTOSÍ</option>
                                            <option value="SINALOA">SINALOA</option>
                                            <option value="SONORA">SONORA</option>
                                            <option value="TABASCO">TABASCO</option>
                                            <option value="TAMAULIPAS">TAMAULIPAS</option>
                                            <option value="TLAXCALA">TLAXCALA</option>
                                            <option value="VERACRUZ">VERACRUZ</option>
                                            <option value="YUCATAN">YUCATÁN</option>
                                            <option value="ZACATECAS">ZACATECAS</option>
                                          </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="validationCustom03">Municipio</label>
                                        <input class="form-control" type="text" name="municipio" value="{{ isset($domicilio->municipio)?$domicilio->municipio:old('municipio') }}" id="municipio"><br>
                                          <div class="invalid-feedback">
                                              <label style="color:red;">Ingresa un municipio válido</label>
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom03">Colonia</label>
                                      <input class="form-control" type="text" name="colonia" value="{{ isset($domicilio->colonia)?$domicilio->colonia:old('colonia') }}" id="colonia"><br>
                                          <div class="invalid-feedback">
                                              Ingresa una colonia válida
                                          </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label for="validationCustom03">Descripción</label>
                                      <input class="form-control" type="text" name="descripcion" value="{{ isset($domicilio->descripcion)?$domicilio->colonia:old('descripcion') }}" id="descripcion"><br>
                                          <div class="invalid-feedback">
                                              Ingresa una descripción válida
                                          </div>
                                    </div>
                                </div>


                          </form>
                               
                            </div>
                            <input type="submit" value=" Guardar cambios" class="btn btn-success">
                                <a href="{{ url('domicilio/') }}" class="btn btn-primary">Regresar</a>
                            <br>
                        </div>
                        
                            </form>


            </div>
            </div>

            @endsection

@section('js')

<script type="text/javascript">

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

@endsection

