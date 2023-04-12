@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'tipo_asistencia/edit'
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
                    <h2>Editar Tipo Asistencia</h2>                       
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
                <form action="{{ url('/Tipasis/update/'.$tipo_asistencia->id) }}" method="post">
                @csrf
                <div class="form row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <input class="form-control" type="text" name="tipo" value="{{ isset($tipo_asistencia->tipo)?$tipo_asistencia->tipo:old('tipo') }}" id="tipo"><br>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input class="form-control" type="text" name="descripcion" value="{{ isset($tipo_asistencia->descripcion)?$tipo_asistencia->descripcion:old('descripcion') }}" id="descripcion"><br>
                        </div>
                    </div>

                </div>
                <input type="submit" value="Guardar cambios" class="btn btn-success">
                    <a href="{{ url('tipo_asistencia/') }}" class="btn btn-primary">Regresar</a>
                <br>
            </div>
            
                </form>
</div>
</div>

@endsection
