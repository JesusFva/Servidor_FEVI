@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'carrera'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner9.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                <div class="col text-right">
                
                    <a href="{{ url('carrera/create') }}" class="btn btn-primary" style="background-color:#008a8a; color:#fff"> 
                        Registrar Carrera
                    </a>                          
                  </div>
              </div>

              <div class="table-responsive"  style="overflow: hidden; ">
               <table id="tbasignados" class="table table-bordered table-hover dt-responsive nowrap display" style="width:100%">
                              <thead style="background-color: #008a8a">
                    <tr>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Carrera</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Siglas</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Descripción</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Duración</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Plan educativo</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Plantel</th>
                  
                        <th scope="col" style="color:#fff">Acciones</th>
                    </tr>

                  </thead>
                  <tbody class="list">
                    @foreach($carreras as $carrera)

                    <tr>
                      <td class="budget text-center">
                            {{ $carrera->nombre }}
                      </td> 
                      <td class="budget text-center" >
                            {{ $carrera->siglas }}
                      </td>
                      <td class="budget text-center" >
                            {{ $carrera->descripcion }}
                      </td>
                      <td class="budget text-center" >
                            {{ $carrera->duracion }}
                      </td>
                      <td class="budget text-center" >
                            {{ $carrera->plan_educativo }}
                      </td>
                      <td class="budget text-center" >
                            {{ $carrera->plantel->nombre }}
                      </td>
                      
                      <td class="text-center">
                        <div class="dropdown">
                        <a class='editar btn btn-warning' href="{{ url('/carrera/'.$carrera->id.'/edit') }}"  title="Editar Datos">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ url('/carrera/'.$carrera->id) }}" class="d-inline form-delete" method='POST'>
                            {{ method_field('DELETE') }}   
                            @csrf
                                <button type="submit" 
                                  
                                    class='eliminar btn btn-danger' title="Eliminar Registro">
                                        <i class="far fa-trash-alt"></i>
                                </button>
                        </form>
                        </div>

                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {!! $carreras->links() !!}
              </div>
            </div>
          </div>

          

@endsection

@section('js')

<script type="text/javascript">

@if (Session::get('eliminar') == 'ok')
        Swal.fire(
            'Borrado',
            'Se ha eliminado correctamente',
            'success'
            )
@endif




   $('.form-delete').submit(
        function (e){
            e.preventDefault();
            
        
        Swal.fire({
                title: '¿Desea eliminar esta carrera?',
                text: "No podrá recuperarlo",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar'
            }).then((result) => {
                if (result.value) {
                    this.submit();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Operación cancelada',
                        showConfirmButton: false,
                        timer: 1500
                        })
                }
            })
        }
    );
   

    
</script>

@endsection
