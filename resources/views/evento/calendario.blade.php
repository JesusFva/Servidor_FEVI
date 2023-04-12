

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
      background: #23a5b9;color:white;
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

 
  <body>

    <div class="container">
      <div style="height:50px"></div>
      <p class="lead">
      <h3 style="font-size: 35px;  text-align: center; color:#333; font-weight: bold;">Calendario</h3>
        @if(@Auth::user()->hasRole('Administrador') || @Auth::user()->hasRole('Profesor'))
      <a class="btn btn-info " style="background-color: #23a5b9"  href="{{ asset('/Evento/form') }}">Crear un evento</a>
        @endif

      <hr>

      <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['last']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
          </a>
          <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['next']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
          </a>
        </div>

      </div>
      <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miércoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sábado</div>
        <div class="col header-col">Domingo</div>
      </div>
      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)

          @if  ($dayweek['mes']==$mes)
            <div class="col box-day" >
            <p style="font-size: 18px;">
              {{ $dayweek['dia']  }}
            </p>
              <!-- evento -->
              @foreach  ($dayweek['evento'] as $event) 
                  <a style="font-size:16px;" class="badge badge-primary" href="{{ asset('/Evento/details/') }}/{{ $event->id }}">
                    {{ $event->titulo }}
                  </a>
              @endforeach
            </div>
          @else
          <div class="col box-dayoff">
          </div>
          @endif


          @endforeach
        </div>
      @endforeach

    </div> <!-- /container -->

    <!-- Footer -->

<!-- Footer -->

  </body>
  