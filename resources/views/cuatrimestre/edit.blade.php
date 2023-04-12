@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'cuatrimestre/edit'
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
            <form action="{{ url('/Cuatri/update/'.$cuatrimestre->id) }}" method="post">
            <!-- <form action="{{ url('/cuatrimestre/'.$cuatrimestre->id) }}" method="update"> -->
                @csrf
                <div class="form row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="periodo">Periodo</label>
                            <input hidden class="form-control" type="number" name="id" value="{{ isset($cuatrimestre->id)?$cuatrimestre->id:old('id') }}" id="id"><br>
                            <input class="form-control" type="text" name="periodo" value="{{ isset($cuatrimestre->periodo)?$cuatrimestre->periodo:old('periodo') }}" id="periodo"><br>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="anio">Año</label>
                            <input class="form-control" type="text" name="anio" value="{{ isset($cuatrimestre->anio)?$cuatrimestre->anio:old('anio') }}" id="anio"><br>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="f_inicio">Fecha de Inicio</label>
                            <input class="form-control" type="date" name="f_inicio" value="{{ isset($cuatrimestre->f_inicio)?$cuatrimestre->f_inicio:old('f_inicio') }}" id="f_inicio"><br>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="f_fin">Fecha Fin</label>
                            <input class="form-control" type="date" name="f_fin" value="{{ isset($cuatrimestre->f_fin)?$cuatrimestre->f_fin:old('f_fin') }}" id="f_fin"><br>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Guardar cambios" class="btn btn-success">
                    <a href="{{ url('cuatrimestre/') }}" class="btn btn-primary">Regresar</a>
                <br>
            </div>
            
                </form>

</div>
</div>


@endsection