@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'asistencia'
])

@section('content')

<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(../img/banners/banner7.jpg); background-size: cover; background-position: center top; filter: brightness(60%);">
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
                
                    <a href="{{ url('tipo_asistencia/create') }}" class="btn btn-primary" style="background-color:#008a8a; color:#fff"> 
                        Registrar Tipo de asistencia
                    </a>                          
                  </div>
              </div>

              <div class="table-responsive"  style="overflow: hidden; ">
               <table id="tbasignados" class="table table-bordered table-hover dt-responsive nowrap display" style="width:100%">
                              <thead style="background-color: #008a8a">
                    <tr>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Tipo</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Descripción</th>
                  
                        <th scope="col" style="color:#fff">Acciones</th>
                    </tr>

                  </thead>
                  <tbody class="list">
                    @foreach($tipo_asistencias as $tipo_asistencia)
                  
  
                    <tr>
                      <td class="budget text-center">
                            {{ $tipo_asistencia->tipo }}
                      </td> 
                      <td class="budget text-center" >
                            {{ $tipo_asistencia->descripcion }}
                      </td>
                      
                      <td class="text-center">
                        <div class="dropdown">
                        <a class='editar btn btn-warning' href="{{ url('/tipo_asistencia/'.$tipo_asistencia->id.'/edit') }}"  title="Editar Datos">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ url('/tipo_asistencia/'.$tipo_asistencia->id) }}" class="d-inline form-delete" method='POST'>
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
                {!! $tipo_asistencias->links() !!}
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
                title: '¿Desea eliminar este tipo de asistencia?',
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

