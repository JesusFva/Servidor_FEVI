@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/misdatos'
])

@section('content')

@include('users.partials.header', [
        'title' => __('Datos de ') . auth()->user()->name,
        'description' => __('    '),
        'class' => 'col-lg-22'
    ]) 

    <div class="content">

<div class="card-body shadow" >
    <div class="card-header bg-transparent border-0" style="background-color: #fff;"> 
        <div class="table-responsive"  style="overflow: hidden; ">
            <table id="tbasignados" class="table table-bordered table-hover dt-responsive nowrap display" style="width:100%">
                <thead style="background-color: #008a8a">
                    <tr>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Nombre</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Matrícula</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Fotografía</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <tr>
                        <td class="budget text-center"> {{ $alumno->nombre }} {{ $alumno->ap_p }} {{ $alumno->ap_m }}</td>
                        <td class="budget text-center"> {{ $alumno->matricula }} </td>
                        <td class="budget text-center"> <img src="{{ asset('fotos'.'/'.$alumno->url_foto) }}" alt="" width="100" height="100" class="img-thumbnail img-fluid">  </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <a href="{{ url('dashboard/') }}" class="btn btn-primary">Regresar</a>
    </div>
    </div>
</div>
@endsection


