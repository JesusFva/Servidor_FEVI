@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'materia/edit'
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
                    <h2>Editar Materia</h2>                       
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
                <form action="{{ url('/Materia/update/'.$materia->id) }}" method="post">
                @csrf
                <div class="form row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" value="{{ isset($materia->nombre)?$materia->nombre:old('nombre') }}" id="nombre"><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="horas">Horas</label>
                            <input class="form-control" type="text" name="horas" value="{{ isset($materia->horas)?$materia->horas:old('horas') }}" id="horas"><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo_materia">Código Materia</label>
                            <input class="form-control" type="text" name="codigo_materia" value="{{ isset($materia->codigo_materia)?$materia->codigo_materia:old('codigo_materia') }}" id="codigo_materia"><br>
                        </div>
                    </div>

                </div>
                <input type="submit" value="Guardar cambios" class="btn btn-success">
                    <a href="{{ url('materia/') }}" class="btn btn-primary">Regresar</a>
                <br>
            </div>
            
                </form>
</div>
</div>

@endsection
