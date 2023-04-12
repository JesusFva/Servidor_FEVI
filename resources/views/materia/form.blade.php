@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'materia/form'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner11.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                    <h2>{{ $modo }} Materia</h2>                       
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
            <form action="{{ asset('/Materia/create/') }}" method="post">
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
                            <input class="form-control" type="text"  name="horas" onkeypress="return valideKey(event);" minlength="1" maxlength="2" value="{{ isset($materia->horas)?$materia->horas:old('horas') }}" id="horas"><br>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="codigo_materia">Código Materia</label>
                            <input class="form-control" type="text" name="codigo_materia" value="{{ isset($materia->codigo_materia)?$materia->codigo_materia:old('codigo_materia') }}" id="codigo_materia"><br>
                        </div>
                    </div>

                </div>
                <input type="submit" value="{{ $modo }} Datos" class="btn btn-success">
                    <a href="{{ url('materia/') }}" class="btn btn-primary">Regresar</a>
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