@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'puesto/edit'
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
                        <h2>Editar Cuatrimestre</h2>                        
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
                        <form action="{{ url('/Puesto/update/'.$puesto->id) }}" method="post">
                            @csrf
                            <div class="form row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="nombre_puesto">Puesto</label>
                                        <input class="form-control" type="text" name="nombre_puesto" value="{{ isset($puesto->nombre_puesto)?$puesto->nombre_puesto:old('nombre_puesto') }}" id="nombre_puesto"><br>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="descripcion">Descripción</label>
                                        <input class="form-control" type="text" name="descripcion" value="{{ isset($puesto->descripcion)?$puesto->descripcion:old('descripcion') }}" id="descripcion"><br>
                                    </div>
                                </div>

                               
                            </div>
                            <input type="submit" value="Guardar cambios" class="btn btn-success">
                                <a href="{{ url('puesto/') }}" class="btn btn-primary">Regresar</a>
                            <br>
                        </div>
                        
                            </form>


            </div>
            </div>

            @endsection

