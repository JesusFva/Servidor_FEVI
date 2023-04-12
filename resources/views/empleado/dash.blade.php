@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'empleado/create'
])

@section('content')
<div class="container">
<br><br><br>
<h4>Bienvenido . {{ auth()->user()->name }} </h4>
            <td>
            
            <form action="{{ url('/personalEmpleado') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                <label for="correoR" hidden="true">Correo R</label>
                <input hidden="true" class="form-control" type="text" name="correoR" value="{{ auth()->user()->email }}" id="correoR"><br>
                    </div>   
                <input type="submit" value="Mis datos" class="btn btn-primary">


                </form>
            </td>
            <td>
            
            <form action="{{ url('/contactosEmpleado') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                <label for="correoR" hidden="true">Correo R</label>
                <input hidden="true" class="form-control" type="text" name="correoR" value="{{ auth()->user()->email }}" id="correoR"><br>
                    </div>   
                <input type="submit" value="Mis contactos" class="btn btn-primary">


                </form>
            </td>
            <td>
            
            <form action="{{ url('/domiciliosEmpleado') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                <label for="correoR" hidden="true">Correo R</label>
                <input hidden="true" class="form-control" type="text" name="correoR" value="{{ auth()->user()->email }}" id="correoR"><br>
                    </div>   
                <input type="submit" value="Mi domicilio" class="btn btn-primary">


                </form>
            </td>

            <form action="{{ url('/gruposEmpleado') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                <label for="correoR" hidden="true">Correo R</label>
                <input hidden="true" class="form-control" type="text" name="correoR" value="{{ auth()->user()->email }}" id="correoR"><br>
                    </div>   
                <input type="submit" value="Mis Grupos" class="btn btn-primary">


                </form>
            </td>
            
</div>
@endsection