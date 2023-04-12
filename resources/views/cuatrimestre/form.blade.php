@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'cuatrimestre/form'
])

@section('content')


<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner3.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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


@if(Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
   
       <p style="font-size: 15px; color: black;"> {{ Session::get('mensaje') }} </p>
    
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<br><br><br>

             <div class="card-body shadow" >
              <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 
                <div class="col text-center">
                    <h2>{{ $modo }} Cuatrimestre</h2>                       
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
            <form action="{{ asset('/Cuatri/create/') }}" method="post">
                @csrf
                <div class="form row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="periodo">Periodo</label>
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
                <input type="submit" id="form-crear" value="{{ $modo }} Datos" class="btn btn-success">
                    <a href="{{ url('cuatrimestre/') }}" class="btn btn-primary">Regresar</a>
                <br>
            </div>
            
                </form>

    <!-- <div class="form row">
        <div class="col-md-4 mb-3">
            <label for="periodo">Período</label>
            <input class="form-control" type="text" name="periodo" value="{{ isset($cuatrimestre->periodo)?$cuatrimestre->periodo:old('periodo') }}" id="periodo"><br>
        </div>
        <div class="col-md-2 mb-3">
            <label for="anio">Año</label>
            <input class="form-control" type="text" name="anio" value="{{ isset($cuatrimestre->anio)?$cuatrimestre->anio:old('anio') }}" id="anio"><br>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-2 mb-3">
            <label for="f_inicio">Fecha de Inicio</label>
            <input class="form-control" type="date" name="f_inicio" value="{{ isset($cuatrimestre->f_inicio)?$cuatrimestre->f_inicio:old('f_inicio') }}" id="f_inicio"><br>
        </div>
        <div class="col-md-2 mb-3">
            <label for="f_fin">Fecha Fin</label>
            <input class="form-control" type="date" name="f_fin" value="{{ isset($cuatrimestre->f_fin)?$cuatrimestre->f_fin:old('f_fin') }}" id="f_fin"><br>
        </div>
    </div>
 -->


</div>
</div>

@endsection

@section('js')

<script type="text/javascript">

$('#form-crear').submit(function(e){

    e.preventDefault();

    Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Your work has been saved',
    showConfirmButton: false,
    timer: 1500
    })
});
    


</script>
@endsection