@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'evento/form'
])

@section('content')
<html>
  <head>
  <style>
    body {
      font-family: 'Exo', sans-serif;
    }
    h3 {
      font-size: 35px;  
      text-align: center; 
      color:#333; 
      font-weight: bold;
    }
    label {
      font-size: 20px;
      color: #389B85;
    }
    input {
      background-color: #23a5b9;
    }
    </style>

  </head>
  <body id="content">

  <div class="content">
    <div class="container">
      <h3>Evento</h3>
      <hr>
      <a class="btn btn-info"  href="{{ asset('/home') }}">Atrás</a>
     

      @if (count($errors) > 0)
        <div class="alert alert-danger">
         <button type="button" class="close" data-dismiss="alert">×</button>
         <ul>
          @foreach ($errors->all() as $error)
           <li>{{ $error }}</li>
          @endforeach
         </ul>
        </div>
       @endif
       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{ $message }}</strong>
       </div>
       @endif


      <div class="col-md-6">
        <form action="{{ asset('/Evento/create/') }}" method="post">
          @csrf
          <br>
          <div class="form-group">
            <label>Título</label>
            <input type="text" class="form-control" name="titulo">
          </div>
          <br>
          <div class="form-group">
            <label>Descripción del Evento</label>
            <input type="text" class="form-control" name="descripcion">
          </div>
          <br>
          <div class="form-group">
            <label>Fecha</label>
            <input type="date" class="form-control" name="fecha">
          </div>
          <br>
          <input type="submit" class="btn btn-info" value="Guardar">
        </form>
        
      
      </div>


      <!-- inicio de semana -->

      </div>
    </div> <!-- /container -->

<!-- Footer -->

  </body>
</html>
@endsection