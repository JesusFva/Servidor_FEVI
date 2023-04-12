@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'asistencia/save_ass'
])

@section('content')
<div class="container">

@csrf
@include('asistencia.form',['modo'=>'Crear'])

</div>
@endsection