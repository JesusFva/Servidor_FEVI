@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'referencia_alumno/create'
])
@section('content')

<div class="container">
<br>
<br>
<br>

<form action="{{ url('/referencia_alumno') }}" method="post">
@csrf
@include('referencia_alumno.form',['modo'=>'Crear']);

</form>
</div>
@endsection