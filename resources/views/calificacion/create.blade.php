@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'calificacion/save_cal'
])

@section('content')
<div class="container">
    
@csrf
@include('calificacion.form',['modo'=>'Crear']);

</div>
@endsection