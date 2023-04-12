@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'alumno/mismaterias'
])

@section('content')

@include('users.partials.header', [
        'title' => __('Materias de ') . auth()->user()->name,
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
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Materia</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Calificación 1er Parcial</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Calificación 2do Parcial</th>
                        <th scope="col" class="sort"  style="color:#fff" data-sort="budget">Calificación 3er Parcial</th>
                    </tr>
                </thead>
                <tbody class="list">
                @foreach($materias as $materia)
                    <tr>
                        <td class="budget text-center"> {{ $materia->nombre }} </td>
                        <td class="budget text-center"> 1er Parc </td>
                        <td class="budget text-center"> 2do Parc </td>
                        <td class="budget text-center"> 3er Parc </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    <a href="{{ url('dashboard/') }}" class="btn btn-primary">Regresar</a>
    </div>
    </div>
</div>
@endsection

