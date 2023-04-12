@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'plantel/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner8.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>{{ $modo }} Plantel</h2>                    
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
            <form action="{{ asset('/Plantel/create/') }}" method="post">
                @csrf
                <div class="form row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="cct">CCT</label>
                            <input class="form-control" type="text" name="cct" value="{{ isset($plantel->cct)?$plantel->cct:old('cct') }}" id="cct"><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="nombre" name="nombre" value="{{ isset($plantel->nombre)?$plantel->nombre:old('nombre') }}" id="nombre"><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="empleado">Control Escolar</label>
                                <select class="form-control" aria-label="Default select example" name="id_empleado" id="id_empleado">
                                    <option value="">Selecciona Control Escolar</option>
                                        @foreach ($empleados as $empleado)
                                            @if($vol != 0)
                                                @if($empleado->id == $plantel->id_empleado)
                                                    <option value="{{$empleado->id}}" selected> {{ $empleado->nombre }} {{ $empleado->ap_paterno }} {{ $empleado->ap_materno }}</option>
                                                @else
                                                    <option value="{{$empleado->id}}"> {{ $empleado->nombre }} {{ $empleado->ap_paterno }} {{ $empleado->ap_materno }}</option>
                                                @endif
                                            @else
                                                <option value="{{$empleado->id}}"> {{ $empleado->nombre }} {{ $empleado->ap_paterno }} {{ $empleado->ap_materno }}</option>
                                            @endif

                                        @endforeach
                                </select>
                        </div>
                    </div>

                </div>
                <input type="submit" value="{{ $modo }} Datos" class="btn btn-success">
                    <a href="{{ url('plantel/') }}" class="btn btn-primary">Regresar</a>
                <br>
            </div>
            
                </form>
</div>
</div>

@endsection
