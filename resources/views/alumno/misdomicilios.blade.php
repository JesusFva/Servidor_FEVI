@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/create'
])

@section('content')

@include('users.partials.header', [
        'title' => __('Domicilio de ') . auth()->user()->name,
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
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Calle</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Colonia</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Municipio</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Estado</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Código Postal</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <tr>
                        <td class="budget text-center"> {{ $domicilio->calle }} </td>
                        <td class="budget text-center"> {{ $domicilio->colonia }} </td>
                        <td class="budget text-center"> {{ $domicilio->municipio }} </td>
                        <td class="budget text-center"> {{ $domicilio->estado }} </td>
                        <td class="budget text-center"> {{ $domicilio->cp }} </td>
                    </tr>
                </tbody>
            </table>
        </div>
    <a href="{{ url('dashboard/') }}" class="btn btn-primary">Regresar</a>
    </div>
    </div>
</div>
@endsection

