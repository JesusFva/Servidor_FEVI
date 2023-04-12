@extends('layouts.main', [
    'class' => '',
    'elementActive' => 'referencia_alumno/edit'
])

@section('content')
<div class="container">
<form action="{{ url('/referencia_alumno/'.$referencia_alumno->id) }}" method="post">
@csrf
{{ method_field('PATCH') }}

@include('referencia_alumno.form',['modo'=>'Editar']);

</form>
</div>
@endsection