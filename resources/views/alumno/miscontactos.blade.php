@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/miscontactos'
])

@section('content')

@include('users.partials.header', [
        'title' => __('Contactos de ') . auth()->user()->name,
        'description' => __('    '),
        'class' => 'col-lg-20'
    ]) 

<div class="content">

<div class="card-body shadow" >
    <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 
        <div class="table-responsive"  style="overflow: hidden; ">
            <table id="tbasignados" class="table table-bordered table-hover dt-responsive nowrap display" style="width:100%">
                <thead style="background-color: #008a8a">
                    <tr>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Correo</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Teléfono</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Celular</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <tr>
                        <td class="budget text-center"> {{ $contacto->correo }} </td>
                        <td class="budget text-center"> {{ $contacto->telefono }} </td>
                        <td class="budget text-center"> {{ $contacto->celular }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <a href="{{ url('dashboard/') }}" class="btn btn-primary">Regresar</a>
    </div>
    </div>
</div>
@endsection