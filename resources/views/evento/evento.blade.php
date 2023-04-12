@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'evento'
])

@section('content')
<html>
  <head>
    <style>
    body{
      font-family: 'Exo', sans-serif;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #EE192D;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>

  </head>
  <body>

    
    <div class="content">
    <div class="container">
      <div style="height:50px"></div>
   <br><br>
      <p class="lead">
      <h3 style="font-size: 35px;  text-align: center; color:#333; font-weight: bold;">Detalles del evento</h3>
      <hr>
      <a class="btn btn-info" style="background-color: #23a5b9;"   href="{{ asset('/home') }}">Atrás</a>
      



      <div class="col-md-6">
        <form action="{{ asset('/Evento/create/') }}" method="post">
          <div class="form-group">
            <h4 style="color: #389B85;">Título</h4>
            <p style="font-size:18px;"> {{ $event->titulo }} </p>
          </div>
          <br>
          <div class="form-group">
            <h4 style="color: #389B85;">Descripción del Evento</h4>
            <p style="font-size:18px;"> {{ $event->descripcion }} </p>
          </div>
          <br>
          <div class="form-group">
            <h4 style="color: #389B85;">Fecha</h4>
            <p style="font-size:18px;"> {{ $event->fecha }} </p>
          </div>
          <br><br><br>
         
        </form>
      </div>


      <!-- inicio de semana -->

      </div>
    </div> <!-- /container -->

    <!-- Footer -->

<!-- Footer -->

  </body>
</html>
@endsection